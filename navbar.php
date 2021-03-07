<div class="justify-content-center">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="dashboard.php">SMS </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Master
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="country.php">Country</a>
                <a class="dropdown-item" href="state.php">State</a>
                <a class="dropdown-item" href="city.php">City</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user.php">User Manager</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teacher.php">Teacher</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="class.php">Class</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Student
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="student.php">Student</a>
                <a class="dropdown-item" href="studentReportFilter.php">Report</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout(<?php echo $_SESSION['name']; ?>)</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>