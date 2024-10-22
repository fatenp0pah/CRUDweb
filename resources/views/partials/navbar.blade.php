<!DOCTYPE html>
<html lang="en">
<!-- resources/views/partials/navbar.blade.php -->
<nav>
    <ul>
        <li><a href="{{ route('customers.index') }}">Customers</a></li>
        <li><a href="{{ route('orders.index') }}">MAu Order</a></li>
        <li><a href="{{ route('services.index') }}">Services</a></li>
        @auth
            <li>
                <span>Welcome, {{ auth()->user()->name }}</span>
                <div class="dropdown">
                    <button class="dropbtn">Profile</button>
                    <div class="dropdown-content">
                        <a href="{{ route('admin.profile') }}">User Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </li>
        @endauth
    </ul>
</nav>

<style>
    /* Navbar styles */
    nav {
        background-color: #f8f9fa; /* Light background color */
        padding: 1rem; /* Padding around navbar */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Shadow effect */
    }

    ul {
        list-style-type: none; /* Remove bullet points */
        padding: 0; /* Remove padding */
        margin: 0; /* Remove margin */
        display: flex; /* Flexbox for horizontal layout */
        gap: 1rem; /* Space between items */
    }

    li {
        position: relative; /* Position for dropdown */
    }

    a {
        text-decoration: none; /* Remove underline from links */
        color: #007bff; /* Link color */
    }

    .dropdown {
        display: inline-block; /* Inline-block for dropdown */
    }

    .dropbtn {
        background-color: transparent; /* Transparent background */
        border: none; /* Remove border */
        cursor: pointer; /* Pointer cursor on hover */
        color: #007bff; /* Color for the button */
    }

    .dropdown-content {
        display: none; /* Hidden by default */
        position: absolute; /* Position below the dropdown */
        background-color: #f9f9f9; /* Background color */
        min-width: 160px; /* Minimum width */
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); /* Shadow effect */
        z-index: 1; /* Ensure it appears above other content */
    }

    .dropdown:hover .dropdown-content {
        display: block; /* Show dropdown on hover */
    }

    button[type="submit"] {
        background-color: #dc3545; /* Red background for logout */
        color: white; /* White text color */
        border: none; /* No border */
        padding: 0.5rem 1rem; /* Padding */
        cursor: pointer; /* Pointer cursor */
        margin-top: 5px; /* Space above the button */
        width: 100%; /* Full width */
    }

    button[type="submit"]:hover {
        background-color: #c82333; /* Darker red on hover */
    }
</style>
