<?php

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a teacher can create, view, update, and delete a student', function () {
    $this->actingAs(User::factory()->create(['role' => 'teacher']));

    $studentData = [
        'nis' => '2026001',
        'name' => 'Ayu Lestari',
        'email' => 'ayu@example.test',
        'gender' => 'P',
        'class' => '10 AKL',
        'major' => 'AKL',
    ];

    $this->post(route('students.store'), $studentData)
        ->assertRedirect(route('students.index'));

    $student = Student::firstOrFail();

    $this->get(route('students.index'))->assertSuccessful();
    $this->get(route('students.create'))->assertSuccessful();
    $this->get(route('students.edit', $student))->assertSuccessful();

    $this->get(route('students.show', $student))
        ->assertSuccessful()
        ->assertSee('Ayu Lestari');

    $this->put(route('students.update', $student), [...$studentData, 'name' => 'Ayu Putri'])
        ->assertRedirect(route('students.index'));

    expect($student->fresh()->name)->toBe('Ayu Putri');

    $this->delete(route('students.destroy', $student))
        ->assertRedirect(route('students.index'));

    $this->assertDatabaseMissing('students', ['id' => $student->id]);
});

test('student registration assigns the student role and authenticates the user', function () {
    $this->post(route('register-post'), [
        'name' => 'Raka Siswa',
        'email' => 'raka@example.test',
        'password' => 'password-123',
        'password_confirmation' => 'password-123',
    ])->assertRedirect(route('students.index'));

    $this->assertAuthenticated();
    $this->assertDatabaseHas('users', [
        'email' => 'raka@example.test',
        'role' => 'student',
    ]);
});

test('a student cannot access teacher-only major routes', function () {
    $this->actingAs(User::factory()->create(['role' => 'student']))
        ->get(route('majors.index'))
        ->assertForbidden();
});

test('a teacher sees class records on the class index', function () {
    $this->actingAs(User::factory()->create(['role' => 'teacher']))
        ->get(route('classes.index'))
        ->assertSuccessful()
        ->assertSee('XII AKL 1')
        ->assertDontSee('Daftar Siswa');
});
