<?php
$books = [
    ['src' => 'images/cosmos.jpg', 'title' => 'Cosmos', 'author' => 'Carl Sagan', 'year' => 1980, 'genre' => 'Ciência', 'description' => 'Cosmos é uma obra que explora o universo, sua criação, evolução e os mistérios que ele contém. Através de uma abordagem científica e acessível, Carl Sagan nos leva a uma jornada para entender o nosso lugar no cosmos.'],
    ['src' => 'images/cosmos.jpg', 'title' => 'Uma Breve História do Tempo', 'author' => 'Stephen Hawking', 'year' => 1988, 'genre' => 'Astronomia, Física', 'description' => 'Stephen Hawking explora temas como o Big Bang, buracos negros, a teoria das cordas e a natureza do tempo de maneira acessível e envolvente, tornando a ciência moderna compreensível para o público geral.'],
    ['src' => 'images/cosmos.jpg', 'title' => 'O Universo numa Casca de Noz', 'author' => 'Stephen Hawking', 'year' => 2001, 'genre' => 'Astronomia, Física', 'description' => 'Em "O Universo numa Casca de Noz", Hawking aborda conceitos complexos da física e cosmologia de forma mais acessível, explorando teorias sobre a origem do universo, buracos negros e a estrutura do cosmos.'],
    ['src' => 'images/cosmos.jpg', 'title' => 'Astrofísica para Pessoas Apressadas', 'author' => 'Neil deGrasse Tyson', 'year' => 2017, 'genre' => 'Astronomia', 'description' => 'Neil deGrasse Tyson apresenta a astrofísica de uma forma concisa e clara, abordando desde os princípios básicos do universo até as últimas descobertas científicas, tudo em uma linguagem simples e direta.'],
    ['src' => 'images/cosmos.jpg', 'title' => 'A Dança do Universo', 'author' => 'Mario Novello', 'year' => 2007, 'genre' => 'Astronomia', 'description' => 'Mario Novello explora as descobertas modernas sobre a origem e a evolução do universo, explicando a teoria do Big Bang, a natureza da gravidade e a possibilidade de um multiverso.'],
];


$booksPerPage = 24;


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;


$startIndex = ($page - 1) * $booksPerPage;

$booksToShow = array_slice($books, $startIndex, $booksPerPage);

$totalBooks = count($books);
$totalPages = ceil($totalBooks / $booksPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astronomia hoje</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&family=Courgette&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body style="background-color: black;">

<?php include 'header.php'; ?>

<div class="nebulosas text-center" style="background-color:#820000; color:white; padding: 2px;">
    <h2>Livros</h2>
</div>

<div class="container mt-5">
    <div class="row justify-content-center g-4">
        <?php foreach ($booksToShow as $index => $book): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4 d-flex justify-content-center">
                <img src="<?= $book['src']; ?>" alt="<?= $book['title']; ?>" class="img-fluid" data-bs-toggle="modal" data-bs-target="#bookModal<?= $index + 1 ?>">
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php foreach ($booksToShow as $index => $book): ?>
    <div class="modal fade" id="bookModal<?= $index + 1 ?>" tabindex="-1" aria-labelledby="bookModalLabel<?= $index + 1 ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookModalLabel<?= $index + 1 ?>"><?= $book['title']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6><strong>Autor:</strong> <?= $book['author']; ?></h6>
                    <h6><strong>Ano de Publicação:</strong> <?= $book['year']; ?></h6>
                    <h6><strong>Gênero:</strong> <?= $book['genre']; ?></h6>
                    <p><strong>Resumo:</strong></p>
                    <p><?= $book['description']; ?></p>
                    <p><strong>Por que ler este livro?</strong></p>
                    <p>Este livro oferece uma visão profunda sobre <?= strtolower($book['genre']); ?>, abordando temas relevantes de uma maneira envolvente e acessível. Uma leitura que com certeza expandirá sua compreensão sobre o mundo e além.</p>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<div class="d-flex justify-content-center mt-4">
    <ul class="pagination">
        <?php if ($page > 1): ?>
            <li class="page-item"><a class="page-link" href="?page=1">&laquo; Primeira</a></li>
            <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">Anterior</a></li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">Próxima</a></li>
            <li class="page-item"><a class="page-link" href="?page=<?= $totalPages ?>">Última &raquo;</a></li>
        <?php endif; ?>
    </ul>
</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
