<?php

require_once('connections/connections.php'); // We need the function!

$order = 'asc';

echo "<section class='bg-light' id='team'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12 text-center'>
                    <h2 class='section-heading text-uppercase'>AVILA CREW</h2>
                    <h3 class='section-subheading text-muted'>A nossa equipa. <a href='team.php?sort=$order'><i class=\"fas fa-sort-alpha-down\"></i></a></h3>
            </div>
        </div>
        <div class='row'>";

$query = 'SELECT id_mentors, name, title, description_short, description, image, user, pass FROM avila_mentors'; // Define the query

$query3 =  'SELECT id_mentors, name, title, description_short, description, image, user, pass FROM avila_mentors ORDER BY DESC';



if (isset($_GET['sort'])){
    if ($_GET['sort'] == 'asc'){

        echo "olá";
        $query2 = 'SELECT id_mentors, name, title, description_short, description, image, user, pass FROM avila_mentors ORDER BY ASC';
        $link = new_db_connection(); // Create a new DB connection

        $stmt = mysqli_stmt_init($link); // create a prepared statement

        if (mysqli_stmt_prepare($stmt, $query2)) { // Prepare the statement
            var_dump($_GET['sort']);
            mysqli_stmt_execute($stmt); // Execute the prepared statement

            mysqli_stmt_bind_result($stmt, $id_mentors1, $name1, $title1, $description_short1, $description1, $image1); // Bind results

            while (mysqli_stmt_fetch($stmt)) { // Fetch values
                echo "
            <div class='col-sm-4'>
                <div class='team-member'>
                    <a href='member_info.php?id=$id_mentors1'><img class='mx-auto rounded-circle'
                                               src='img/team/$image1' alt=''></a>
                    <h4>$name1</h4>
                    <p class='text-muted'>$title1</p>
                    <p>$description_short1</p>
                    <ul class='list-inline social-buttons'>
                        <li class='list-inline-item'>
                            <a href='#'>
        <i class='fab fa-twitter'></i>
                            </a>
                        </li>
                        <li class='list-inline-item'>
                            <a href='#'>
        <i class='fab fa-facebook-f'></i>
                            </a>
                        </li>
                        <li class='list-inline-item'>
                            <a href='#'>
        <i class='fab fa-linkedin-in'></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>";
            }
            mysqli_stmt_close($stmt); // Close statement
        }
        mysqli_close($link); // Close connection
    }
    else if ($_GET['sort'] == 'desc'){
        $order = 'asc';

        $link2 = new_db_connection(); // Create a new DB connection

        $stmt2 = mysqli_stmt_init($link); // create a prepared statement

        if (mysqli_stmt_prepare($stmt2, $query3)) { // Prepare the statement
            mysqli_stmt_execute($stmt2); // Execute the prepared statement

            mysqli_stmt_bind_result($stmt2, $id_mentors, $name, $title, $description_short, $description, $image, $user, $pass); // Bind results

            while (mysqli_stmt_fetch($stmt2)) { // Fetch values
                echo "
            <div class='col-sm-4'>
                <div class='team-member'>
                    <a href='member_info.php?id=$id_mentors'><img class='mx-auto rounded-circle'
                                               src='img/team/$image' alt=''></a>
                    <h4>$name</h4>
                    <p class='text-muted'>$title</p>
                    <p>$description_short</p>
                    <ul class='list-inline social-buttons'>
                        <li class='list-inline-item'>
                            <a href='#'>
        <i class='fab fa-twitter'></i>
                            </a>
                        </li>
                        <li class='list-inline-item'>
                            <a href='#'>
        <i class='fab fa-facebook-f'></i>
                            </a>
                        </li>
                        <li class='list-inline-item'>
                            <a href='#'>
        <i class='fab fa-linkedin-in'></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
";
            }
            mysqli_stmt_close($stmt2); // Close statement
        }
        mysqli_close($link2); // Close connection
    }
} else{

    $link3 = new_db_connection(); // Create a new DB connection

    $stmt3 = mysqli_stmt_init($link3); // create a prepared statement

    if (mysqli_stmt_prepare($stmt3, $query)) { // Prepare the statement
        mysqli_stmt_execute($stmt3); // Execute the prepared statement

        mysqli_stmt_bind_result($stmt3, $id_mentors, $name, $title, $description_short, $description, $image, $user, $pass); // Bind results

        while (mysqli_stmt_fetch($stmt3)) { // Fetch values
            echo "<div class='col-sm-4'>
                <div class='team-member'>
                    <a href='member_info.php?id=$id_mentors'><img class='mx-auto rounded-circle'
                                               src='img/team/$image' alt=''></a>
                    <h4>$name</h4>
                    <p class='text-muted'>$title</p>
                    <p>$description_short</p>
                    <ul class='list-inline social-buttons'>
                        <li class='list-inline-item'>
                            <a href='#'>
        <i class='fab fa-twitter'></i>
                            </a>
                        </li>
                        <li class='list-inline-item'>
                            <a href='#'>
        <i class='fab fa-facebook-f'></i>
                            </a>
                        </li>
                        <li class='list-inline-item'>
                            <a href='#'>
        <i class='fab fa-linkedin-in'></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
";
        }
        mysqli_stmt_close($stmt3); // Close statement
    }
    mysqli_close($link3); // Close connection
}



echo "</div>
</section>"

?>



