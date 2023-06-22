<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lifeflow_db";

$connect = mysqli_connect($servername, $username, $password, $database);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Your Page Title</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body class="donorTable">
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="filter-form">
        <label for="organ-filter">Filter by Organ:</label>
        <select name="organ-filter" id="organ-filter">
            <option value="all">All</option>
            <option value="liver">Liver</option>
            <option value="pancreas">Pancreas</option>
            <!-- Add more options for other organs -->
        </select>
        <button type="submit">Filter</button>
    </form>

    <?php
    $rows_per_page = 10; // Define the number of rows to display per page
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $rows_per_page;

    $organFilter = isset($_GET['organ-filter']) ? $_GET['organ-filter'] : 'all';
    $organCondition = '';
    if ($organFilter !== 'all') {
        $organCondition = "AND recip_neededOrgan = '$organFilter'";
    }

    $sql = "SELECT recip_firstName, recip_bloodType,
            CASE recip_boolBlood
                WHEN 1 THEN 'Yes'
                WHEN 0 THEN 'No'
            END AS recip_boolBlood, recip_neededOrgan, recip_neededOrgan,
            recip_ethnicity, recip_sex
            FROM recipient_info_tbl
            WHERE recip_status = 0 $organCondition
            LIMIT $rows_per_page OFFSET $offset";

    $result = $connect->query($sql);

    // Generate HTML table
    if ($result->num_rows > 0) {
        echo '<table>
            <tr>
                <th class="firstTH">Name</th>
                <th>Blood Type</th>
                <th>Blood Request</th>
                <th>Organ Request</th>
                <th>Ethnicity</th>
                <th class="lastTH">Sex</th>
            </tr>';

        // Output data rows
        $row_count = 0;
        while ($row = $result->fetch_assoc()) {
            $row_count++;
            echo '<tr' . ($row_count === 10 ? ' class="tenth-row"' : '') . '>
                <td' . ($row_count === 10 ? ' class="first-td"' : '') . '>' . $row["recip_firstName"] . '</td>
                <td>' . $row["recip_bloodType"] . '</td>
                <td>' . $row["recip_boolBlood"] . '</td>
                <td>' . $row["recip_neededOrgan"] . '</td>
                <td>' . $row["recip_ethnicity"] . '</td>
                <td' . ($row_count === 10 ? ' class="last-td"' : '') . '>' . $row["recip_sex"] . '</td>
            </tr>';
        }

        echo '</table>';

        // Display navigation options
        $sql_count = "SELECT COUNT(*) AS total_rows FROM recipient_info_tbl WHERE recip_status <> 0 $organCondition";
        $result_count = $connect->query($sql_count);
        $row_count = $result_count->fetch_assoc();
        $total_rows = $row_count['total_rows'];

        $total_pages = ceil($total_rows / $rows_per_page);

        echo '<div class="pagination">';
        if ($current_page > 1) {
            echo '<a href="#" class="pagination-link" id="pagingLeft" data-page="' . ($current_page - 1) . '"><img src="../Images/Recipient-Donor-Dashboard/nav-icons/bx-chevron-left.svg" class="arrowLeft"></a>';
        }

        // Display index of available pages
        for ($page = 1; $page <= $total_pages; $page++) {
            $active_class = ($page == $current_page) ? 'active' : '';
            echo '<a href="#" class="pagination-link ' . $active_class . '" data-page="' . $page . '">' . $page . '</a>';
        }

        if ($current_page < $total_pages) {
            echo '<a href="#" class="pagination-link" id="pagingRight" data-page="' . ($current_page + 1) . '"><img src="../Images/Recipient-Donor-Dashboard/nav-icons/bx-chevron-right.svg" class="arrowRight"></a>';
        }
        echo '</div>';
    } else {
        echo 'No results found.';
    }
    ?>
</body>
</html>
