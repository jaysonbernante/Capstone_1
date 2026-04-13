<?php
$page = 'member';
include '../../../component/admin_header.php';
include '../../../component/admin_sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Management</title>
    <link href="../../../assets/css/toastednotif.css" rel="stylesheet">
    <link href="../../../assets/css/admin_header.css" rel="stylesheet">
    <link href="../../../assets/css/admin_sidebar.css" rel="stylesheet">
    <link href="../../../assets/css/admin.css" rel="stylesheet">
</head>
<style>
</style>
<style>
    .Member-content{
        margin-left: 250px;
        margin-top: 60px;
        padding: 2rem;
        min-height: calc(100vh - 60px);
        background: #222;
    }
    @media (max-width: 900px) {
        .Member-content {
            margin-left: 0;
            padding: 1rem;
        }
    }
    .admin-table {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        background: rgba(0,0,0,0.04);
        font-family: 'Inter', Arial, sans-serif;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        border-radius: 16px;
        overflow: hidden;
    }
    .admin-table thead th:first-child {
        border-top-left-radius: 16px;
    }
    .admin-table thead th:last-child {
        border-top-right-radius: 16px;
    }
    .admin-table tbody tr:last-child td:first-child {
        border-bottom-left-radius: 16px;
    }
    .admin-table tbody tr:last-child td:last-child {
        border-bottom-right-radius: 16px;
    }
    .admin-table th, .admin-table td {
        padding: 12px 10px;
    text-align: left;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    }
    .admin-table th {
        background: rgba(0,0,0,0.04);
        font-weight: 700;
        color: #fff;
        border-bottom: 2px solid #333;
    }
    .admin-table tr {
        transition: background 0.2s;
    }
    .admin-table tbody tr:hover {
        background: #f9f9f965;
        color: #333;
    }
    .admin-table td {
        border-bottom: 1px solid #333;
        font-size: 15px;
    }
    .badge-status {
        display: inline-block;
        padding: 2px 12px;
        border-radius: 12px;
        font-size: 90%;
        font-weight: 600;
        color: #fff;
    }
    .badge-active {
        background: #43a047;
    }
    .badge-inactive {
        background: #e53935;
    }
    .badge-auth {
        background: #ffe082;
        color: #795548;
        border-radius: 8px;
        padding: 2px 10px;
        font-weight: 600;
    }
    .action-btn {
        background: none;
        border: none;
        color: #1976d2;
        cursor: pointer;
        padding: 0 8px;
        font-size: 15px;
        transition: color 0.2s;
    }
    .action-btn.delete {
        color: #d32f2f;
    }
    .action-btn:hover {
        text-decoration: underline;
    }
    .admin-table th:nth-child(1){width:18%;}
    .admin-table th:nth-child(2){width:20%;}
    .admin-table th:nth-child(3){width:9%;}
    .admin-table th:nth-child(4){width:10%;}
    .admin-table th:nth-child(5){width:12%;}
    .admin-table th:nth-child(6){width:12%;}
    .admin-table th:nth-child(7){width:auto;}
    .admin-table th:nth-child(6){width:15%;}

    /* Responsive table - horizontal scroll on small screens */
    .table-wrapper {
        overflow-x: auto;
        width: 100%;
    }
    @media (max-width: 700px) {
        #searchUsername { width: 100% !important; box-sizing: border-box; }
        .admin-table { min-width: 600px; }
    }
    /* Modal */
    .modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.65);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }
    .modal-overlay.active { display: flex; }
    .modal-box {
        background: #2c2c2c;
        border-radius: 16px;
        padding: 32px;
        max-width: 480px;
        width: 90%;
        color: #fff;
        box-shadow: 0 8px 32px rgba(0,0,0,0.5);
    }
    .modal-box h2 { margin: 0 0 8px; font-size: 1.3rem; }
    .modal-subtitle { color: #aaa; font-size: 14px; margin: 0 0 20px; }
    .type-cards { display: flex; gap: 16px; }
    .type-card {
        flex: 1;
        padding: 24px 16px;
        border-radius: 12px;
        border: 2px solid #444;
        text-align: center;
        cursor: pointer;
        background: #333;
        font-weight: 600;
        font-size: 1rem;
        color: #fff;
        transition: border-color 0.2s, background 0.2s;
    }
    .type-card.session:hover { border-color: #1976d2; background: rgba(25,118,210,0.12); }
    .type-card.membership { opacity: 0.45; cursor: not-allowed; }
    .type-card .card-icon { font-size: 1.8rem; margin-bottom: 8px; }
    .modal-form { display: none; }
    .modal-form.active { display: block; }
    .btn-back {
        background: none;
        border: none;
        color: #aaa;
        cursor: pointer;
        font-size: 13px;
        padding: 0;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .btn-back:hover { color: #fff; }
    .modal-form label { display: block; margin-bottom: 4px; font-size: 13px; color: #bbb; }
    .modal-form input, .modal-form select {
        width: 100%;
        padding: 8px 12px;
        border-radius: 8px;
        border: 1px solid #444;
        background: #1a1a1a;
        color: #fff;
        margin-bottom: 12px;
        box-sizing: border-box;
        font-size: 14px;
    }
    .modal-form .form-row { display: flex; gap: 10px; }
    .modal-form .form-row > div { flex: 1; }
    .modal-actions { display: flex; gap: 10px; margin-top: 4px; }
    .btn-submit { padding: 9px 22px; border-radius: 8px; border: none; background: #1976d2; color: #fff; font-weight: 600; cursor: pointer; }
    .btn-submit:hover { background: #1565c0; }
    .btn-cancel-modal { padding: 9px 22px; border-radius: 8px; border: none; background: #444; color: #fff; font-weight: 600; cursor: pointer; }
    .user-cell { display: flex; align-items: center; gap: 10px; }
    .user-avatar {
        width: 36px; height: 36px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 15px; font-weight: 700; color: #fff;
        flex-shrink: 0; text-transform: uppercase;
    }
    .user-name-text { font-weight: 500; color: #fff; }
    </style>
<body>
    <div class="Member-content">
        <h1>Member Management</h1>
        <?php
require_once '../../../app/config/connection.php';

$search = $_GET['search'] ?? '';

$typeFilter = $_GET['type'] ?? '';

try {
    $query = "SELECT * FROM members WHERE 1";
    $params = [];
    if ($search !== '') {
        $query .= " AND username LIKE ?";
        $params[] = "%$search%";
    }
    if ($typeFilter !== '') {
        $query .= " AND type = ?";
        $params[] = $typeFilter;
    }
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $members = $stmt->fetchAll();

} catch (Exception $e) {
    echo '<div style="color:red">Error fetching members: ' . htmlspecialchars($e->getMessage()) . '</div>';
    $members = [];
}
?>

        <div style="margin-bottom:15px; display:flex; gap:10px; flex-wrap:wrap; align-items:center;">
    <input type="text" id="searchUsername" placeholder="Search username..."
        style="padding:8px 12px;border-radius:8px;border:1px solid #ccc;width:250px;">
    <select id="typeFilter" style="padding:8px 12px;border-radius:8px;border:1px solid #ccc;">
        <option value="">All Types</option>
        <option value="session">Session</option>
        <option value="member">Member</option>
    </select>
    <div style="margin-left:auto; display:flex; gap:8px;">
        <button type="button" id="addUserBtn" style="padding:8px 18px; border-radius:8px; border:none; background:#1976d2; color:#fff; font-weight:600; cursor:pointer;">+ Add User</button>
        
    </div>
</div>
        <div class="table-wrapper" style="margin-top: 24px;">
            <table class="admin-table" border="1" cellpadding="8" cellspacing="0" style="width:100%; background:#333;">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>RFID</th>
                        <th>Joined Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (empty($members)): ?>
                    <tr><td colspan="7" style="text-align: center;" >No members found.</td></tr>
                <?php else: ?>
                    <?php foreach ($members as $member): ?>
                        <?php
                            $username = trim($member['first_name'] . ' ' . $member['last_name']);
                            $status = ($member['type'] === 'active')
                                ? '<span class="badge-status badge-active">Active</span>'
                                : '<span class="badge-status badge-inactive">Inactive</span>';
                            $joined = $member['Joined_Date'] ? date('d M Y', strtotime($member['Joined_Date'])) : '-';
                            $auth2f = '<span class="badge-auth">Enabled</span>'; // Placeholder
                            $avatarColors = ['#1976d2','#e53935','#388e3c','#f57c00','#7b1fa2','#00838f','#c62828','#2e7d32','#1565c0','#6a1b9a'];
                            $firstLetter = strtoupper(substr($member['first_name'], 0, 1)) ?: '?';
                            $avatarColor = $avatarColors[ord($firstLetter) % count($avatarColors)];
                        ?>
                        <tr>
                            <td data-label="Username">
                                <div class="user-cell">
                                    <div class="user-avatar" style="background:<?= $avatarColor ?>"><?= htmlspecialchars($firstLetter) ?></div>
                                    <span class="user-name-text"><?= htmlspecialchars($username) ?></span>
                                </div>
                            </td>
                            <td data-label="Email"><?= htmlspecialchars($member['gmail']) ?></td>
                            <td data-label="Type"><?= htmlspecialchars($member['type']) ?></td>
                            <td data-label="Status"><?= $status ?></td>
                            <td data-label="RFID"><?= htmlspecialchars($member['RFID'] ?? '-') ?></td>
                            <td data-label="Joined Date"><?= htmlspecialchars($joined) ?></td>
                            <td data-label="Actions">
                                <form method="post" action="?edit=<?= $member['id'] ?>" style="display:inline">
                                    <button type="submit" class="action-btn">Edit</button>
                                </form>
                                <form method="post" action="" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this member?');">
                                    <input type="hidden" name="delete_id" value="<?= $member['id'] ?>">
                                    <button type="submit" class="action-btn delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                </table>
        </div>
        <?php
        // Handle Add User (Session)
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
            $first_name = trim($_POST['first_name'] ?? '');
            $last_name  = trim($_POST['last_name'] ?? '');
            $gmail      = trim($_POST['gmail'] ?? '');
            $phone      = trim($_POST['phone'] ?? '');
            $address    = trim($_POST['address'] ?? '');
            $username   = strtolower($first_name . $last_name);
            $password   = password_hash('12345fitness', PASSWORD_DEFAULT);
            $type       = 'session';
            $stmt = $pdo->prepare("INSERT INTO members (first_name, last_name, username, gmail, phone, address, type, password, Joined_Date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, CURDATE())");
            $stmt->execute([$first_name, $last_name, $username, $gmail, $phone, $address, $type, $password]);
            echo "<meta http-equiv='refresh' content='0'>";
            exit;
        }

        // Handle Delete
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
            $deleteId = intval($_POST['delete_id']);
            $pdo->prepare("DELETE FROM members WHERE id = ?")->execute([$deleteId]);
            echo "<meta http-equiv='refresh' content='0'>"; // Refresh to update table
            exit;
        }

        // Handle Edit (redirect to edit page or show form)
        if (isset($_GET['edit'])) {
            $editId = intval($_GET['edit']);
            // You can redirect or show an edit form here. For now, just a placeholder:
            echo "<script>alert('Edit functionality for member ID: $editId coming soon!');</script>";
        }
        ?>
    </div>

<!-- Add User Modal -->
<div class="modal-overlay" id="addUserModal">
    <div class="modal-box">
        <h2>Add User</h2>
        <p class="modal-subtitle">Select registration type</p>

        <!-- Type selection cards -->
        <div id="typeSelection">
            <div class="type-cards">
                <div class="type-card session" id="btnSessionCard">
                    <div class="card-icon">&#127939;</div>
                    Session
                </div>
                <div class="type-card membership" title="Coming soon">
                    <div class="card-icon">&#127942;</div>
                    Membership
                </div>
            </div>
        </div>

        <!-- Session Registration Form -->
        <div class="modal-form" id="sessionForm">
            <button type="button" class="btn-back" id="btnBack">&#8592; Back</button>
            <form method="post">
                <input type="hidden" name="add_user" value="1">
                <div class="form-row">
                    <div>
                        <label>First Name <span style="color:#e57373">*</span></label>
                        <input type="text" name="first_name" required placeholder="First name">
                    </div>
                    <div>
                        <label>Last Name <span style="color:#e57373">*</span></label>
                        <input type="text" name="last_name" required placeholder="Last name">
                    </div>
                </div>
                <label>Gmail <span style="color:#666">(optional)</span></label>
                <input type="email" name="gmail" placeholder="example@gmail.com">
                <label>Phone <span style="color:#666">(optional)</span></label>
                <input type="text" name="phone" placeholder="Phone number">
                <label>Address <span style="color:#666">(optional)</span></label>
                <input type="text" name="address" placeholder="Address">
                <p style="font-size:12px; color:#888; margin: -4px 0 12px;">Default password: <strong style="color:#aaa">12345fitness</strong></p>
                <div class="modal-actions">
                    <button type="submit" class="btn-submit">Register</button>
                    <button type="button" class="btn-cancel-modal" id="btnCloseModal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function(){

    function fetchMembers() {
        var search = $('#searchUsername').val();
        var type = $('#typeFilter').val();
        $.ajax({
            url: "member.php",
            method: "GET",
            data: { search: search, type: type },
            success: function(data) {
                var newTable = $(data).find("tbody").html();
                $("tbody").html(newTable);
            }
        });
    }
    $('#searchUsername').on('keyup', fetchMembers);
    $('#typeFilter').on('change', fetchMembers);

    // Modal logic
    $('#addUserBtn').on('click', function() {
        $('#addUserModal').addClass('active');
        $('#typeSelection').show();
        $('#sessionForm').removeClass('active');
    });
    $('#btnSessionCard').on('click', function() {
        $('#typeSelection').hide();
        $('#sessionForm').addClass('active');
    });
    $('#btnBack').on('click', function() {
        $('#sessionForm').removeClass('active');
        $('#typeSelection').show();
    });
    $('#btnCloseModal').on('click', function() {
        $('#addUserModal').removeClass('active');
    });
    $('#addUserModal').on('click', function(e) {
        if (e.target === this) $('#addUserModal').removeClass('active');
    });

});

</script>
</body>
</html>
