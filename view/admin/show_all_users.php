<?php
// Make sure user is admin.
if (!($app->session->get("rights") == "admin")) {
    $location = $app->url->create('account');
    header("Location: $location");
    die();
}

function mergeQueryString($options, $prepend = "?")
{
    // Parse querystring into array
    $query = [];
    parse_str($_SERVER["QUERY_STRING"], $query);

    // Merge query string with new options
    $query = array_merge($query, $options);

    // Build and return the modified querystring as url
    return $prepend . http_build_query($query);
}

function orderby($column, $route)
{
    $asc = mergeQueryString(["orderby" => $column, "order" => "asc"], $route);
    $desc = mergeQueryString(["orderby" => $column, "order" => "desc"], $route);

    return <<<EOD
<span class="orderby">
<a href="$asc">&darr;</a>
<a href="$desc">&uarr;</a>
</span>
EOD;
}


// Get number of hits per page
$hits = getGet("hits", 4);
if (!(is_numeric($hits) && $hits > 0 && $hits <= 8)) {
    die("Not valid for hits.");
}

// Get max number of pages
$sql = "SELECT COUNT(id) AS max FROM users;";
$max = $app->db->executeFetchAll($sql);
$max = ceil($max[0]->max / $hits);

// Get current page
$page = getGet("page", 1);
if (!(is_numeric($hits) && $page > 0 && $page <= $max)) {
    die("Not valid for page.");
}
$offset = $hits * ($page - 1);

// Only these values are valid
$columns = ["id", "username", "email", "rights"];
$orders = ["asc", "desc"];

// Get settings from GET or use defaults
$orderBy = getGet("orderby") ?: "id";
$order = getGet("order") ?: "asc";

// Incoming matches valid value sets
if (!(in_array($orderBy, $columns) && in_array($order, $orders))) {
    die("Not valid input for sorting.");
}

$params = [];
if (getPost("doSearch")) {
    $sql = "SELECT * FROM users WHERE username LIKE ? OR email LIKE ? OR
            rights LIKE ? ORDER BY $orderBy $order LIMIT $hits OFFSET $offset;";
            $params = [getPost("search"), getPost("search"), getPost("search")];
} else {
    $sql = "SELECT * FROM users ORDER BY $orderBy $order LIMIT $hits OFFSET $offset;";
}
$resultset = $app->db->executeFetchAll($sql, $params);
// break;


$defaultRoute = $app->url->create("admin/show_all_users?");
?>


<main>
    <?php
    include ANAX_INSTALL_PATH . "/view/take1/contentHeader.php";
    ?>
    <div class="contentBody">
        <a href="<?= $app->url->create('admin/') ?>">Tillbaka till Admin</a>
        <br>
        <form action="" method="post">
            <legend>Sök</legend>
            <input type="text" name="search">
            <input type="submit" name="doSearch" value="sök">
        </form>
        <a href="">Visa alla</a>
        <br>
        <p>Rader/sida:
            <a href="?hits=2">2</a> |
            <a href="?hits=4">4</a> |
            <a href="?hits=8">8</a>
        </p>

        <table class="allUsersTable">
            <tr class="first">
                <th>Id <?= orderby("id", $defaultRoute) ?></th>
                <th>Användarnamn <?= orderby("username", $defaultRoute) ?></th>
                <th>E-Mail <?= orderby("email", $defaultRoute) ?></th>
                <th>Rättigheter <?= orderby("rights", $defaultRoute) ?></th>
                <th>Ändra</th>
                <th>Byt Lösenord</th>
                <th>Ta bort</th>
            </tr>
            <?php foreach ($resultset as $row) : ?>
                <tr>
                    <td><?= $row->id ?></td>
                    <td><?= $row->username ?></td>
                    <td><?= $row->email ?></td>
                    <td><?= $row->rights ?></td>
                    <td><a href="<?= $app->url->create('admin/edit_user?username=' . $row->username) ?>">Redigera</a></td>
                    <td><a href="<?= $app->url->create('admin/change_password?username=' . $row->username) ?>">Byt Lösenord</a></td>
                    <td><a href="<?= $app->url->create('admin/remove_user?delete_name=' . $row->username) ?>">Ta bort</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <p>
            Sida:
            <?php for ($i = 1; $i <= $max; $i++) : ?>
                <a href="<?= mergeQueryString(["page" => $i], $defaultRoute) ?>"><?= $i ?></a>
            <?php endfor; ?>
        </p>
    </div>
</main>
