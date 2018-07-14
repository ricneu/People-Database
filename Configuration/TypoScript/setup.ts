


plugin.tx_rncontacts_contactlist {
    view {
        templateRootPaths.0 = EXT:rncontacts/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_rncontacts_contactlist.view.templateRootPath}
        partialRootPaths.0 = EXT:rncontacts/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_rncontacts_contactlist.view.partialRootPath}
        layoutRootPaths.0 = EXT:rncontacts/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_rncontacts_contactlist.view.layoutRootPath}
        widget.TYPO3\CMS\Fluid\ViewHelpers\Widget\PaginateViewHelper.templateRootPath = EXT:rnnewsdesk/Resources/Private/Templates/
    }
    persistence {
        storagePid = {$plugin.tx_rncontacts_contactlist.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 0
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
    settings {
        gmapskey =
        cardDetailDefault = {$template.cardDetailDefault}
    }
    classes {
        Mab\Oavents\Domain\Model\Events {
            mapping {
                tablename = tx_rncontacts_domain_model_contact
                columns {
                    zip.mapOnProperty = zip
                    street.mapOnProperty = street
                    city.mapOnProperty = city
                }
            }
        }

    }
}

plugin.tx_rncontacts.view.widget.TYPO3\CMS\Fluid\ViewHelpers\Widget\PaginateViewHelper.templateRootPath = EXT:rnnewsdesk/Resources/Private/Templates/
plugin.tx_rncontacts_locationmap {
    view {
        templateRootPaths.0 = EXT:rncontacts/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_rncontacts_locationmap.view.templateRootPath}
        partialRootPaths.0 = EXT:rncontacts/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_rncontacts_locationmap.view.partialRootPath}
        layoutRootPaths.0 = EXT:rncontacts/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_rncontacts_locationmap.view.layoutRootPath}

    }
    persistence {
        storagePid = {$plugin.tx_rncontacts_locationmap.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 0
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

# these classes are only used in auto-generated templates
plugin.tx_rncontacts._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-rncontacts table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-rncontacts table th {
        font-weight:bold;
    }

    .tx-rncontacts table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)

api_tag = PAGE
api_tag {
    config {
        disableAllHeaderCode = 1
        additionalHeaders = Content-type:application/html
        xhtml_cleaning = 0
        debug =1
        no_cache = 1
        admPanel = 0
    }
    typeNum = 1452982642
    10 < tt_content.list.20.rncontacts_locationmap
    10.switchableControllerActions {
        Location {
            1 = ajaxlist
        }
    }
}