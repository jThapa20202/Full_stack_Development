@extends('layouts.master')

@section('title', 'Edit Student')

@section('content')
    <h2>Edit Student</h2>
    
    <form action="index.php?action=edit&id={{ $student['id'] }}" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $student['name'] }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $student['email'] }}" required>
        </div>
        
        <div class="form-group">
            <label for="course">Course:</label>
            <input type="text" id="course" name="course" value="{{ $student['course'] }}" required>
        </div>
        
        <button type="submit" class="btn btn-success">Update Student</button>
        <a href="index.php?action=index" class="btn">Cancel</a>
    </form>
@endsection