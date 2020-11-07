<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <!--<a class="nav-link active" href="index.php">
                  <span data-feather="home"></span>
                  User Profile <span class="sr-only">(current)</span>
                </a>-->
              </li>
              <?php 
@session_start();
	if($_SESSION['user_role']=="admin"){
	
?>
			  <li class="nav-item">
                <a class="nav-link" href="users.php">
                  <span data-feather="file"></span>
                Users
                </a>
              </li>
  <?php } ?>


             
				<li class="nav-item">
                <a class="nav-link" href="lottery.php">
                  <span data-feather="file"></span>
                  Lottery
                </a>
				</li>
				<li class="nav-item">
                <a class="nav-link" href="results.php">
                  <span data-feather="file"></span>
                 Results
                </a>
				</li>

        <li class="nav-item">
                <a class="nav-link" href="userprofile.php">
                  <span data-feather="file"></span>
                  User Profile
                </a>
				</li>
        <li class="nav-item">
                <a class="nav-link" href="fb_view.php">
                  <span data-feather="file"></span>
                  Feedback
                </a>
				</li>
        <li class="nav-item">
                <a class="nav-link" href="view_sales.php">
                  <span data-feather="file"></span>
                  Monthly Sales
                </a>
				</li>
			
					 
            </ul>

            
          </div>
        </nav>