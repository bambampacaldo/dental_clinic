<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <style>
        :root {
            --header-height: 3rem;
            --nav-width: 68px;
            --first-color: #87CEEB;
            --first-color-light: #AFA5D9;
            --white-color: #F7F6FB;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100;
        }

        body {
            position: relative;
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s;
            background: #f4f6f9;
        }

        .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s;
            box-shadow: 0 1px 4px rgba(0,0,0,.1);
        }

        .header_toggle {
            color: var(--first-color);
            font-size: 1.5rem;
            cursor: pointer;
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: -30%;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--first-color);
            padding: .5rem 1rem 0 0;
            transition: .5s;
            z-index: var(--z-fixed);
        }

        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .nav_logo, .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem;
            text-decoration: none;
            color: var(--white-color);
        }

        .nav_logo {
            margin-bottom: 2rem;
        }

        .nav_logo-icon {
            font-size: 1.25rem;
        }

        .nav_logo-name {
            color: var(--white-color);
            font-weight: 700;
        }

        .nav_link {
            position: relative;
            margin-bottom: 1.5rem;
            transition: .3s;
        }

        .nav_link:hover {
            color: var(--white-color);
            background-color: rgba(0,0,0,.1);
        }

        .nav_icon {
            font-size: 1.25rem;
        }

        .show {
            left: 0;
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 1rem);
        }

        .active {
            background-color: rgba(0,0,0,.1);
        }

        .height-100 {
            height: 100vh;
        }

        .dashboard-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }

        @media screen and (min-width: 768px) {
            body {
                margin: calc(var(--header-height) + 1rem) 0 0 0;
                padding-left: calc(var(--nav-width) + 2rem);
            }

            .header {
                height: calc(var(--header-height) + 1rem);
                padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
            }

            .l-navbar {
                left: 0;
                padding: 1rem 1rem 0 0;
            }

            .show {
                width: calc(var(--nav-width) + 156px);
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px);
            }
        }
    </style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> 
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Logout</button>
            </form>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <i class='bx bx-plus-medical nav_logo-icon'></i>
                    <span class="nav_logo-name">Dental Clinic</span>
                </a>
                <div class="nav_list">
                    <a href="#dashboard" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="{{ route('appointments.index') }}" class="nav_link">
                        <i class='bx bx-calendar nav_icon'></i>
                        <span class="nav_name">Appointments</span>
                    </a>
                    <a href="{{ route('patients.index') }}" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Patients</span>
                    </a>
                    <a href="{{ route('history.index') }}" class="nav_link">
                        <i class='bx bx-history nav_icon'></i>
                        <span class="nav_name">History</span>
                    </a>
                    <a href="{{ route('diagnosis.index') }}" class="nav_link">
                        <i class='bx bx-notepad nav_icon'></i>
                        <span class="nav_name">Diagnosis</span>
                    </a>
                    <a href="{{ route('prescriptions.index') }}" class="nav_link">
                        <i class='bx bx-receipt nav_icon'></i>
                        <span class="nav_name">Prescriptions</span>
                    </a>
                    <a href="{{ route('teeth-records.index') }}" class="nav_link">
                        <i class='bx bx-smile nav_icon'></i>
                        <span class="nav_name">Teeth Registry</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card">
                    <h5>Total Patients</h5>
                    <h2>150</h2>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card">
                    <h5>Today's Appointments</h5>
                    <h2>8</h2>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card">
                    <h5>Pending Treatments</h5>
                    <h2>12</h2>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card">
                    <h5>Total Revenue</h5>
                    <h2>₱25,000</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="dashboard-card">
                    <h4>Today's Appointments</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Patient</th>
                                <th>Treatment</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>09:00 AM</td>
                                <td>John Doe</td>
                                <td>Dental Cleaning</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card">
                    <h4>Quick Actions</h4>
                    <div class="d-grid gap-2">
                        <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-2">New Appointment</a>
                        <a href="{{ route('patients.create') }}" class="btn btn-info mb-2">Add Patient</a>
                        <a href="{{ route('prescriptions.create') }}" class="btn btn-success">Create Prescription</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const showNavbar = (toggleId, navId, bodyId, headerId) =>{
                const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId)

                if(toggle && nav && bodypd && headerpd){
                    toggle.addEventListener('click', ()=>{
                        nav.classList.toggle('show')
                        toggle.classList.toggle('bx-x')
                        bodypd.classList.toggle('body-pd')
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle','nav-bar','body-pd','header')

            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink(){
                if(linkColor){
                    linkColor.forEach(l=> l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l=> l.addEventListener('click', colorLink))
        });
    </script>
</body>
</html> 