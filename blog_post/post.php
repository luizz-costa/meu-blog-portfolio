<?php

require_once('../includes/conexao.php');


if (isset($_GET['slug'])) {
    $link_post = $_GET['slug'];

    $stmt = $mysqli->prepare("SELECT * FROM blog WHERE link_post = ?");
    $stmt->bind_param("s", $link_post);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
        $tags = explode(',', $post['technologies']);
?>

<?php require_once('../includes/header.php');?>

        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto px-4 py-12">
            <h1 class="text-5xl font-bold mb-4 text-text-primary-light dark:text-text-primary-dark">
                <?php echo $post['title']; ?>
            </h1>
            <div class="flex flex-wrap gap-2">
                <?php foreach ($tags as $tag) : ?>
                    <span class="px-2 py-1 text-xs bg-bg-primary-light dark:bg-bg-tertiary-dark text-text-secondary-light dark:text-text-secondary-dark border border-border-primary-light dark:border-border-primary-dark rounded-md transition-all duration-300">
                        <?php echo trim($tag); ?>
                    </span>
                <?php endforeach; ?>
            </div>
            <p class="text-sm mt-6 text-text-secondary-light mb-6">
                <?php echo date('Y-m-d', strtotime($post['created_at'])); ?>
            </p>
            <div class="prose mb-6 text-text-primary-light dark:text-text-primary-dark">
                <?php echo nl2br($post['short_description']); ?>
            </div>
            <!-- diminuir o tamanho da imagem PRECISA FAZER -->
            <?php if (!empty($post['image'])): ?>
                <img src="<?= $basePath ?><?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" class="mb-6 w-full max-h-80 object-cover rounded-lg">
            <?php endif; ?>

            <div class="prose mb-6 text-text-primary-light dark:text-text-primary-dark">
                <?php echo nl2br($post['long_description']); ?>
            </div>

        </div>

<?php
    } else {
        echo "<p>Post não encontrado.</p>";
    }

    $stmt->close();
} else {
    echo "<p>Post inválido.</p>";
}

$mysqli->close();

?>

<?php include '../includes/footer.php'; ?>