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
    <?php
        $rows_per_page = 10; // Define the number of rows to display per page

        // Determine the current page
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        // Calculate the offset for the query
        $offset = ($current_page - 1) * $rows_per_page;

        $sql = "SELECT don_firstName, don_bloodType,
            CASE don_boolBlood
                WHEN 1 THEN 'Yes'
                WHEN 0 THEN 'No'
            END AS don_boolBlood,
            CASE don_boolOrganTissue
                WHEN 1 THEN don_giftOrgan
                WHEN 0 THEN 'No'
            END AS don_giftOrgan,
            don_ethnicity, don_sex
            FROM donor_info_tbl
            LIMIT $rows_per_page OFFSET $offset";

        $result = $connect->query($sql);

        // Generate HTML table
        if ($result->num_rows > 0) {
            echo '<table>
                <tr>
                    <th class="firstTH">Name</th>
                    <th>Blood Type</th>
                    <th>Blood Donor</th>
                    <th>Organ Donation</th>
                    <th>Ethnicity</th>
                    <th class="lastTH">Sex</th>
                </tr>';

            // Output data rows
            $row_count = 0;
            while ($row = $result->fetch_assoc()) {
                $row_count++;
                echo '<tr' . ($row_count === 10 ? ' class="tenth-row"' : '') . '>
                    <td' . ($row_count === 10 ? ' class="first-td"' : '') . '>' . $row["don_firstName"] . '</td>
                    <td>' . $row["don_bloodType"] . '</td>
                    <td>' . $row["don_boolBlood"] . '</td>
                    <td>' . $row["don_giftOrgan"] . '</td>
                    <td>' . $row["don_ethnicity"] . '</td>
                    <td' . ($row_count === 10 ? ' class="last-td"' : '') . '>' . $row["don_sex"] . '</td>
                </tr>';
            }

            echo '</table>';

            // Display navigation options
            $sql_count = "SELECT COUNT(*) AS total_rows FROM donor_info_tbl";
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
