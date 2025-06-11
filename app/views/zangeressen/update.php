<?php require   APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-3">

    <div class="row mb-3">
        <div class="col-3"></div>
        <div class="col-6 text-begin text-warning">        
            <h3><?= $data['title']; ?></h3>
        </div>
        <div class="col-3"></div>
    </div>

    <div class="row mb-3" style="display:<?= $data['message']; ?>">
        <div class="col-3"></div>
        <div class="col-6 text-begin text-warning">        
            <div class="alert alert-success" role="alert">
                Record is gewijzigd
            </div>
        </div>
        <div class="col-3"></div>
    </div>
    
    <!-- begin tabel -->
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">

            <form action="<?= URLROOT; ?>/zangeressen/update" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Naam</label>
                    <input value="<?= $data['zangeres']->Naam; ?>" name="naam" type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="nettowaarde" class="form-label">Nettowaarde (miljoen)</label>
                    <input value="<?= $data['zangeres']->Nettowaarde; ?>" name="nettowaarde" type="number" min="0" max="10000" class="form-control" id="nettowaarde" required>
                </div>
                <div class="mb-3">
                    <label for="land" class="form-label">land</label>
                    <input value="<?= $data['zangeres']->Land; ?>" name="land" type="text" class="form-control" id="land" required>
                    <div id="helpTekstLand" class="form-text">Land waar artiest is geboren</div>
                </div>
                <div class="mb-3">
                    <label for="mobiel" class="form-label">mobiel</label>
                    <input value="<?= $data['zangeres']->Mobiel; ?>" name="mobiel" type="tel" class="form-control" id="mobiel" required placeholder="+31 6 1234 56 78" pattern="\+31 6 \d{4} \d{2} \d{2}" title="Volg exact het patroon inclusief spaties">
                    <div id="helpTekstMobiel" class="form-text">Mobiel van Nederlandse impresario.</div>
                </div>
                <div class="mb-3">
                    <label for="leeftijd" class="form-label">leeftijd</label>
                    <input value="<?= $data['zangeres']->Leeftijd; ?>" name="leeftijd" type="number" min="0" max="120" class="form-control" id="leeftijd" required>
                </div> 
                
                <input type="hidden" name="Id" value="<?= $data['zangeres']->Id; ?>">
                
                <button type="submit" class="btn btn-danger">Wijzig</button>
            </form>
            
            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="col-3"></div>
    </div>
    <!-- eind tabel -->

<?php require   APPROOT . '/views/includes/footer.php'; ?>