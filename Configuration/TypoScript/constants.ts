


plugin.tx_rncontacts_contactlist {
    view {
        # cat=plugin.tx_rncontacts_contactlist/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:rncontacts/Resources/Private/Templates/
        # cat=plugin.tx_rncontacts_contactlist/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:rncontacts/Resources/Private/Partials/
        # cat=plugin.tx_rncontacts_contactlist/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:rncontacts/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_rncontacts_contactlist//a; type=string; label=Default storage PID
        storagePid =
    }
}

plugin.tx_rncontacts_locationmap {
    view {
        # cat=plugin.tx_rncontacts_locationmap/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:rncontacts/Resources/Private/Templates/
        # cat=plugin.tx_rncontacts_locationmap/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:rncontacts/Resources/Private/Partials/
        # cat=plugin.tx_rncontacts_locationmap/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:rncontacts/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_rncontacts_locationmap//a; type=string; label=Default storage PID
        storagePid =
    }
}
