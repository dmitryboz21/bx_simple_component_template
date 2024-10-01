<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<section class="purchase-ways-archive section-margin">
	<div class="container">
		<h2 class="section-title"><?= $arParams['SECTION_TITLE'] ?></h2>
		<div class="purchase-ways-cards">

			<? foreach ($arResult["ITEMS"] as $arItem): ?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div id="<?= $this->GetEditAreaId($arItem['ID']); ?>"
				     class="purchase-way-card <?= isY($arItem['PROPERTIES']['grey_bg']['VALUE'] ?? '') ? ' purchase-way-card--grey ' : '' ?>">
					<div class="purchase-way-card__top">
						<div class="purchase-way-card__name">
							<? if ($arItem["NAME"]): ?>
								<? echo $arItem["NAME"] ?>
							<? endif; ?>
						</div>
						<div class="purchase-way-card__desc"><?= $arItem["PREVIEW_TEXT"] ?></div>
						<?
						$btn_text = $arItem['PROPERTIES']['button_text']['VALUE'] ?? '';
						$btn_link = $arItem['PROPERTIES']['button_link']['VALUE'] ?? '';
						$modal_title = $arItem['PROPERTIES']['modal_title']['VALUE'] ?? '';
						?>
						<? if (strlen($btn_text) > 0) { ?>
							<div class="purchase-way-card__btn-wrap">
								<a class="btn btn--with-arrow btn--dark"
								   href="<?= $btn_link ?>" <?= strlen($modal_title) > 0 ? ' data-title="' . $modal_title . '" ' : '' ?>><span><?= $btn_text; ?></span></a>
							</div>
						<? } ?>

					</div>
					<div class="purchase-way-card__pic">
						<?
						$picture_desktop = if_file_set_get_id($arItem["PREVIEW_PICTURE"]["ID"] ?? '');
						$alt_title = $arItem["PREVIEW_PICTURE"]["DESCRIPTION"] ?? '';

						print_img($picture_desktop, $picture_desktop, $picture_desktop, desktop_x1_wh: [469, 1024], tablet_x1_wh: [928, 2048], mobile_x1_wh: [448, 1024], alt: $arItem["PREVIEW_PICTURE"]['ALT'] ?? '', title: $arItem["PREVIEW_PICTURE"]['TITLE'] ?? '', alt_title: $alt_title, lazy: true);
						?>
					</div>
				</div>
			<? endforeach; ?>
		</div>
	</div>
</section>
