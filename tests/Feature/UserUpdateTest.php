<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserUpdateTest extends TestCase
{
    use RefreshDatabase;

    protected function migrateFreshUsing(): array
    {
        // Only the schema needed here; the later migration repeats carnet and estado.
        return ['--path' => [
            'database/migrations/0001_01_01_000000_create_users_table.php',
            'database/migrations/2026_08_22_154451_add_two_factor_columns_to_users_table.php',
            'database/migrations/2026_09_26_000000_add_profile_fields_to_users_table.php',
        ]];
    }

    private function createUser(array $attributes = []): User
    {
        return User::factory()->create(array_merge([
            'code' => (string) Str::uuid(),
            'paterno' => 'Perez',
            'materno' => 'Lopez',
            'direccion' => 'Calle Central',
            'carnet' => '1234567',
            'telefono' => '76543210',
        ], $attributes));
    }

    private function data(User $user): array
    {
        return $user->only(['name', 'paterno', 'materno', 'direccion', 'carnet', 'telefono', 'email']);
    }

    public function test_name_can_change_without_changing_unique_fields(): void
    {
        $user = $this->createUser();
        $original = $user->only(['email', 'carnet', 'telefono', 'password', 'code']);

        $this->actingAs($user)->put(route('users.update', $user->code),
            array_merge($this->data($user), ['name' => 'Nombre actualizado'])
        )->assertSessionHasNoErrors()->assertRedirect(route('users.index'));

        $this->assertSame('Nombre actualizado', $user->fresh()->name);
        $this->assertSame($original, $user->fresh()->only(array_keys($original)));
        $this->assertDatabaseCount('users', 1);
    }

    public function test_unique_fields_cannot_belong_to_another_user(): void
    {
        $user = $this->createUser();
        $other = $this->createUser(['carnet' => '9999999', 'telefono' => '79999999']);
        $original = $this->data($user);

        foreach (['email', 'carnet', 'telefono'] as $field) {
            $this->actingAs($user)->from(route('users.edit', $user->code))
                ->put(route('users.update', $user->code), array_merge($original, [
                    'name' => 'No guardar',
                    $field => $other->$field,
                ]))->assertSessionHasErrors($field)->assertRedirect(route('users.edit', $user->code));

            $this->assertSame($original, $this->data($user->fresh()));
        }
    }

    public function test_new_unique_values_can_be_saved(): void
    {
        $user = $this->createUser();
        $data = array_merge($this->data($user), [
            'email' => 'nuevo@example.com', 'carnet' => '8888888', 'telefono' => '78888888',
        ]);

        $this->actingAs($user)->put(route('users.update', $user->code), $data)
            ->assertSessionHasNoErrors()->assertRedirect(route('users.index'));

        $this->assertSame($data, $this->data($user->fresh()));
    }

    public function test_unknown_user_returns_not_found(): void
    {
        $user = $this->createUser();

        $this->actingAs($user)->put(route('users.update', 'missing'), $this->data($user))
            ->assertNotFound();
    }
}
