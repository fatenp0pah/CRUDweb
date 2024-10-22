<!DOCTYPE html>
<html lang="en">
<!-- resources/views/partials/navbar.blade.php -->
<nav>
    <ul>
        <li><a href="{{ route('customers.index') }}">Customers</a></li>
        <li><a href="{{ route('orders.index') }}">Orders</a></li>
        <li><a href="{{ route('services.index') }}">Services</a></li>
        @auth
            <li>
                <div class="dropdown">
                    <button class="profile-btn">
                        <img src=https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png alt="User Profile" class="profile-image">
                    </button>
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
    /* Import Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

    /* Navbar styles */
    nav {
        background-color: #654917; /* Darker shade of brown */
        padding: 1rem; /* Padding around navbar */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Shadow effect */
        font-family: 'Roboto', sans-serif; /* Modern font */
    }

    ul {
        list-style-type: none; /* Remove bullet points */
        padding: 0; /* Remove padding */
        margin: 0; /* Remove margin */
        display: flex; /* Flexbox for horizontal layout */
        gap: 2rem; /* Space between items */
    }

    li {
        position: relative; /* Position for dropdown */
    }

    a {
        text-decoration: none; /* Remove underline from links */
        color: #FFF; /* White text for links */
        font-weight: 700; /* Bold links */
        transition: color 0.3s; /* Smooth color transition */
    }

    a:hover {
        color: #FFD700; /* Gold color on hover */
    }

    .dropdown {
        display: inline-block; /* Inline-block for dropdown */
    }

    .profile-btn {
        background-color: transparent; /* Transparent background */
        border: none; /* Remove border */
        cursor: pointer; /* Pointer cursor on hover */
        padding: 0; /* No padding */
    }

    .profile-image {
        border-radius: 50%; /* Circular image */
        width: 40px; /* Set width */
        height: 40px; /* Set height */
        border: 2px solid #FFD700; /* Gold border around image */
        transition: transform 0.3s; /* Smooth transition */
    }

    .profile-btn:hover .profile-image {
        transform: scale(1.1); /* Slightly enlarge image on hover */
    }

    .dropdown-content {
        display: none; /* Hidden by default */
        position: absolute; /* Position below the dropdown */
        background-color: #f9f9f9; /* Background color */
        min-width: 160px; /* Minimum width */
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Shadow effect */
        z-index: 1; /* Ensure it appears above other content */
        border-radius: 5px; /* Rounded corners */
    }

    .dropdown:hover .dropdown-content {
        display: block; /* Show dropdown on hover */
    }

    .dropdown-content a {
        color: #4B3D5D; /* Darker text for dropdown links */
        padding: 12px 16px; /* Padding for dropdown links */
        text-decoration: none; /* Remove underline */
        display: block; /* Block display */
        transition: background-color 0.3s; /* Smooth background transition */
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1; /* Light background on hover */
    }

    button[type="submit"] {
        background-color: #dc3545; /* Red background for logout */
        color: white; /* White text color */
        border: none; /* No border */
        padding: 0.5rem 1rem; /* Padding */
        cursor: pointer; /* Pointer cursor */
        margin-top: 5px; /* Space above the button */
        width: 100%; /* Full width */
        border-radius: 5px; /* Rounded corners */
        font-weight: 700; /* Bold text */
        transition: background-color 0.3s, transform 0.2s; /* Smooth transition */
    }

    button[type="submit"]:hover {
        background-color: #c82333; /* Darker red on hover */
        transform: translateY(-2px); /* Slight lift effect */
    }
</style>
