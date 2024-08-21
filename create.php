<?php

include 'functions.php';

$pdo = pdo_connect_mysql();
$titulo = "Criar Contato";
$msg = '';

if (!empty($_POST)) {
    $id         = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $title      = $_POST['title'];
    $created    = $_POST['created'] ?? date('Y-m-d H:i:s');

    try {
        $stmt = $pdo->prepare('INSERT INTO contacts VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$id, $name, $email, $phone, $title, $created]);
        
        $msg = 'Criado com sucesso';
    } catch (PDOException $pdoException) {
        $msg = 'Erro ao cadastrar';
    }
}
?>



<?= template_header('Novo Contato') ?>

<div class="content update">
    <h2><?= $titulo ?></h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="name">Name</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id" readonly>
        <input type="text" name="name" placeholder="John Doe" id="name">
        <label for="email">Email</label>
        <label for="phone">Phone</label>
        <input type="text" name="email" placeholder="johndoe@example.com" id="email">
        <input type="text" name="phone" placeholder="2025550143" id="phone">
        <label for="title">Title</label>
        <label for="created">Created</label>
        <input type="text" name="title" placeholder="Employee" id="title">
        <input type="datetime-local" name="created" value="<?= date('Y-m-d\TH:i') ?>" id="created">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
        <p><?= $msg ?></p>
    <?php endif; ?>
</div>

<?= template_footer() ?>