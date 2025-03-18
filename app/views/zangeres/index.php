<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-3">

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h3><?= $data['title']; ?></h3>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row mt-3">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Nettowaarde (miljoen)</th>
                        <th scope="col">Land</th>
                        <th scope="col">Mobiel</th>
                        <th scope="col">Leeftijd</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['zangers'] as $zanger) : ?>
                        <tr>
                            <td><?= htmlspecialchars($zanger->Naam); ?></td>
                            <td><?= htmlspecialchars($zanger->Nettowaarde) . 'M'; ?></td>
                            <td><?= htmlspecialchars($zanger->Land); ?></td>
                            <td><?= htmlspecialchars($zanger->Mobiel); ?></td>
                            <td><?= htmlspecialchars($zanger->Leeftijd); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="<?= URLROOT; ?>/homepages/index">terug</a>
        </div>
        <div class="col-1"></div>
    </div>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
