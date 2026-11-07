<?php

/**
 * KYG Framework for Business.
 *
 * @category   Configuration
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->parameters()
        ->set('app.locales', [
            'af' => [
                'name' => 'Afrikaans',
                'dir' => 'ltr',
                'full' => false,
            ],
            'af_NA' => [
                'name' => 'Afrikaans (Namibië)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'af_ZA' => [
                'name' => 'Afrikaans (Suid_Afrika)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'agq' => [
                'name' => 'Aghem',
                'dir' => 'ltr',
                'full' => false,
            ],
            'agq_CM' => [
                'name' => 'Aghem (Kàmàlûŋ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ak' => [
                'name' => 'Akan',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ak_GH' => [
                'name' => 'Akan (Gaana)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'am' => [
                'name' => 'አማርኛ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'am_ET' => [
                'name' => 'አማርኛ (ኢትዮጵያ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ar' => [
                'name' => 'العربية',
                'dir' => 'rtl',
                'full' => false,
            ],
            'ar_001' => [
                'name' => 'العربية (العالم)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_AE' => [
                'name' => 'العربية (الإمارات العربية المتحدة)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_BH' => [
                'name' => 'العربية (البحرين)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_DJ' => [
                'name' => 'العربية (جيبوتي)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_DZ' => [
                'name' => 'العربية (الجزائر)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_EG' => [
                'name' => 'العربية (مصر)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_EH' => [
                'name' => 'العربية (الصحراء الغربية)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_ER' => [
                'name' => 'العربية (إريتريا)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_IL' => [
                'name' => 'العربية (إسرائيل)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_IQ' => [
                'name' => 'العربية (العراق)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_JO' => [
                'name' => 'العربية (الأردن)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_KM' => [
                'name' => 'العربية (جزر القمر)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_KW' => [
                'name' => 'العربية (الكويت)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_LB' => [
                'name' => 'العربية (لبنان)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_LY' => [
                'name' => 'العربية (ليبيا)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_MA' => [
                'name' => 'العربية (المغرب)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_MR' => [
                'name' => 'العربية (موريتانيا)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_OM' => [
                'name' => 'العربية (عُمان)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_PS' => [
                'name' => 'العربية (الأراضي الفلسطينية)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_QA' => [
                'name' => 'العربية (قطر)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_SA' => [
                'name' => 'العربية (المملكة العربية السعودية)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_SD' => [
                'name' => 'العربية (السودان)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_SO' => [
                'name' => 'العربية (الصومال)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_SS' => [
                'name' => 'العربية (جنوب السودان)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_SY' => [
                'name' => 'العربية (سوريا)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_TD' => [
                'name' => 'العربية (تشاد)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_TN' => [
                'name' => 'العربية (تونس)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ar_YE' => [
                'name' => 'العربية (اليمن)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'as' => [
                'name' => 'অসমীয়া',
                'dir' => 'ltr',
                'full' => false,
            ],
            'as_IN' => [
                'name' => 'অসমীয়া (ভারত)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'asa' => [
                'name' => 'Kipare',
                'dir' => 'ltr',
                'full' => false,
            ],
            'asa_TZ' => [
                'name' => 'Kipare (Tadhania)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ast' => [
                'name' => 'asturianu',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ast_ES' => [
                'name' => 'asturianu (España)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'az' => [
                'name' => 'azərbaycan',
                'dir' => 'ltr',
                'full' => false,
            ],
            'az_AZ' => [
                'name' => 'azərbaycan (Azərbaycan)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'az_Cyrl' => [
                'name' => 'азәрбајҹан',
                'dir' => 'ltr',
                'full' => false,
            ],
            'az_Cyrl_AZ' => [
                'name' => 'азәрбајҹан (Кирил, Азәрбајҹан)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'az_Latn' => [
                'name' => 'azərbaycan',
                'dir' => 'ltr',
                'full' => false,
            ],
            'az_Latn_AZ' => [
                'name' => 'azərbaycan (latın, Azərbaycan)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'bas' => [
                'name' => 'Ɓàsàa',
                'dir' => 'ltr',
                'full' => false,
            ],
            'bas_CM' => [
                'name' => 'Ɓàsàa (Kàmɛ̀rûn)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'be' => [
                'name' => 'беларуская',
                'dir' => 'ltr',
                'full' => false,
            ],
            'be_BY' => [
                'name' => 'беларуская (Беларусь)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'bem' => [
                'name' => 'Ichibemba',
                'dir' => 'ltr',
                'full' => false,
            ],
            'bem_ZM' => [
                'name' => 'Ichibemba (Zambia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'bez' => [
                'name' => 'Hibena',
                'dir' => 'ltr',
                'full' => false,
            ],
            'bez_TZ' => [
                'name' => 'Hibena (Hutanzania)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'bg' => [
                'name' => 'български',
                'dir' => 'ltr',
                'full' => false,
            ],
            'bg_BG' => [
                'name' => 'български (България)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'bm' => [
                'name' => 'bamanakan',
                'dir' => 'ltr',
                'full' => false,
            ],
            'bm_ML' => [
                'name' => 'bamanakan (Mali)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'bn' => [
                'name' => 'বাংলা',
                'dir' => 'ltr',
                'full' => false,
            ],
            'bn_BD' => [
                'name' => 'বাংলা (বাংলাদেশ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'bn_IN' => [
                'name' => 'বাংলা (ভারত)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'bo' => [
                'name' => 'བོད་སྐད་',
                'dir' => 'ltr',
                'full' => false,
            ],
            'bo_CN' => [
                'name' => 'བོད་སྐད་ (རྒྱ་ནག)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'bo_IN' => [
                'name' => 'བོད་སྐད་ (རྒྱ་གར་)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'br' => [
                'name' => 'brezhoneg',
                'dir' => 'ltr',
                'full' => false,
            ],
            'br_FR' => [
                'name' => 'brezhoneg (Frañs)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'brx' => [
                'name' => 'बड़ो',
                'dir' => 'ltr',
                'full' => false,
            ],
            'brx_IN' => [
                'name' => 'बड़ो (भारत)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'bs' => [
                'name' => 'bosanski',
                'dir' => 'ltr',
                'full' => false,
            ],
            'bs_BA' => [
                'name' => 'bosanski (Bosna i Hercegovina)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'bs_Cyrl' => [
                'name' => 'босански',
                'dir' => 'ltr',
                'full' => false,
            ],
            'bs_Cyrl_BA' => [
                'name' => 'босански (Босна и Херцеговина)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'bs_Latn' => [
                'name' => 'bosanski',
                'dir' => 'ltr',
                'full' => false,
            ],
            'bs_Latn_BA' => [
                'name' => 'bosanski (Bosna i Hercegovina)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ca' => [
                'name' => 'català',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ca_AD' => [
                'name' => 'català (Andorra)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ca_ES' => [
                'name' => 'català (Espanya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ca_FR' => [
                'name' => 'català (França)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ca_IT' => [
                'name' => 'català (Itàlia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ccp' => [
                'name' => '𑄌𑄋𑄴𑄟𑄳𑄦',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ccp_BD' => [
                'name' => '𑄌𑄋𑄴𑄟𑄳𑄦 (𑄝𑄁𑄣𑄘𑄬𑄌𑄴)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ccp_IN' => [
                'name' => '𑄌𑄋𑄴𑄟𑄳𑄦 (𑄞𑄢𑄧𑄖𑄴)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ce' => [
                'name' => 'нохчийн',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ce_RU' => [
                'name' => 'нохчийн (Росси)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'cgg' => [
                'name' => 'Rukiga',
                'dir' => 'ltr',
                'full' => false,
            ],
            'cgg_UG' => [
                'name' => 'Rukiga (Uganda)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'chr' => [
                'name' => 'ᏣᎳᎩ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'chr_US' => [
                'name' => 'ᏣᎳᎩ (ᏌᏊ ᎢᏳᎾᎵᏍᏔᏅ ᏍᎦᏚᎩ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ckb' => [
                'name' => 'کوردیی ناوەندی',
                'dir' => 'rtl',
                'full' => false,
            ],
            'ckb_IQ' => [
                'name' => 'کوردیی ناوەندی (عێراق)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ckb_IR' => [
                'name' => 'کوردیی ناوەندی (ئێران)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'cs' => [
                'name' => 'čeština',
                'dir' => 'ltr',
                'full' => false,
            ],
            'cs_CZ' => [
                'name' => 'čeština (Česko)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'cv' => [
                'name' => 'чӑваш',
                'dir' => 'ltr',
                'full' => false,
            ],
            'cv_RU' => [
                'name' => 'чӑваш (Раҫҫей)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'cy' => [
                'name' => 'Cymraeg',
                'dir' => 'ltr',
                'full' => false,
            ],
            'cy_GB' => [
                'name' => 'Cymraeg (Y Deyrnas Unedig)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'da' => [
                'name' => 'dansk',
                'dir' => 'ltr',
                'full' => false,
            ],
            'da_DK' => [
                'name' => 'dansk (Danmark)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'da_GL' => [
                'name' => 'dansk (Grønland)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'dav' => [
                'name' => 'Kitaita',
                'dir' => 'ltr',
                'full' => false,
            ],
            'dav_KE' => [
                'name' => 'Kitaita (Kenya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'de' => [
                'name' => 'Deutsch',
                'dir' => 'ltr',
                'full' => false,
            ],
            'de_AT' => [
                'name' => 'Deutsch (Österreich)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'de_BE' => [
                'name' => 'Deutsch (Belgien)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'de_CH' => [
                'name' => 'Deutsch (Schweiz)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'de_DE' => [
                'name' => 'Deutsch (Deutschland)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'de_IT' => [
                'name' => 'Deutsch (Italien)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'de_LI' => [
                'name' => 'Deutsch (Liechtenstein)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'de_LU' => [
                'name' => 'Deutsch (Luxemburg)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'dje' => [
                'name' => 'Zarmaciine',
                'dir' => 'ltr',
                'full' => false,
            ],
            'dje_NE' => [
                'name' => 'Zarmaciine (Nižer)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'dsb' => [
                'name' => 'dolnoserbšćina',
                'dir' => 'ltr',
                'full' => false,
            ],
            'dsb_DE' => [
                'name' => 'dolnoserbšćina (Nimska)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'dua' => [
                'name' => 'duálá',
                'dir' => 'ltr',
                'full' => false,
            ],
            'dua_CM' => [
                'name' => 'duálá (Cameroun)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'dyo' => [
                'name' => 'joola',
                'dir' => 'ltr',
                'full' => false,
            ],
            'dyo_SN' => [
                'name' => 'joola (Senegal)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'dz' => [
                'name' => 'རྫོང་ཁ།',
                'dir' => 'ltr',
                'full' => false,
            ],
            'dz_BT' => [
                'name' => 'རྫོང་ཁ། (འབྲུག།)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ebu' => [
                'name' => 'Kĩembu',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ebu_KE' => [
                'name' => 'Kĩembu (Kenya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ee' => [
                'name' => 'Eʋegbe',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ee_GH' => [
                'name' => 'Eʋegbe (Ghana nutome)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ee_TG' => [
                'name' => 'Eʋegbe (Togo nutome)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'el' => [
                'name' => 'Ελληνικά',
                'dir' => 'ltr',
                'full' => false,
            ],
            'el_CY' => [
                'name' => 'Ελληνικά (Κύπρος)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'el_GR' => [
                'name' => 'Ελληνικά (Ελλάδα)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en' => [
                'name' => 'English',
                'dir' => 'ltr',
                'full' => false,
            ],
            'en_001' => [
                'name' => 'English (world)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_150' => [
                'name' => 'English (Europe)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_AE' => [
                'name' => 'English (United Arab Emirates)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_AG' => [
                'name' => 'English (Antigua & Barbuda)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_AI' => [
                'name' => 'English (Anguilla)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_AS' => [
                'name' => 'English (American Samoa)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_AT' => [
                'name' => 'English (Austria)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_AU' => [
                'name' => 'English (Australia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_BB' => [
                'name' => 'English (Barbados)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_BE' => [
                'name' => 'English (Belgium)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_BI' => [
                'name' => 'English (Burundi)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_BM' => [
                'name' => 'English (Bermuda)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_BS' => [
                'name' => 'English (Bahamas)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_BW' => [
                'name' => 'English (Botswana)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_BZ' => [
                'name' => 'English (Belize)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_CA' => [
                'name' => 'English (Canada)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_CC' => [
                'name' => 'English (Cocos [Keeling] Islands)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_CH' => [
                'name' => 'English (Switzerland)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_CK' => [
                'name' => 'English (Cook Islands)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_CM' => [
                'name' => 'English (Cameroon)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_CX' => [
                'name' => 'English (Christmas Island)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_CY' => [
                'name' => 'English (Cyprus)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_DE' => [
                'name' => 'English (Germany)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_DG' => [
                'name' => 'English (Diego Garcia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_DK' => [
                'name' => 'English (Denmark)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_DM' => [
                'name' => 'English (Dominica)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_ER' => [
                'name' => 'English (Eritrea)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_FI' => [
                'name' => 'English (Finland)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_FJ' => [
                'name' => 'English (Fiji)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_FK' => [
                'name' => 'English (Falkland Islands)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_FM' => [
                'name' => 'English (Micronesia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_GB' => [
                'name' => 'English (United Kingdom)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_GD' => [
                'name' => 'English (Grenada)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_GG' => [
                'name' => 'English (Guernsey)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_GH' => [
                'name' => 'English (Ghana)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_GI' => [
                'name' => 'English (Gibraltar)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_GM' => [
                'name' => 'English (Gambia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_GU' => [
                'name' => 'English (Guam)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_GY' => [
                'name' => 'English (Guyana)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_HK' => [
                'name' => 'English (Hong Kong SAR China)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_ID' => [
                'name' => 'English (Indonesia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_IE' => [
                'name' => 'English (Ireland)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_IL' => [
                'name' => 'English (Israel)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_IM' => [
                'name' => 'English (Isle of Man)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_IN' => [
                'name' => 'English (India)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_IO' => [
                'name' => 'English (British Indian Ocean Territory)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_JE' => [
                'name' => 'English (Jersey)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_JM' => [
                'name' => 'English (Jamaica)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_KE' => [
                'name' => 'English (Kenya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_KI' => [
                'name' => 'English (Kiribati)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_KN' => [
                'name' => 'English (St. Kitts & Nevis)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_KY' => [
                'name' => 'English (Cayman Islands)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_LC' => [
                'name' => 'English (St. Lucia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_LR' => [
                'name' => 'English (Liberia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_LS' => [
                'name' => 'English (Lesotho)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_MG' => [
                'name' => 'English (Madagascar)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_MH' => [
                'name' => 'English (Marshall Islands)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_MO' => [
                'name' => 'English (Macau SAR China)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_MP' => [
                'name' => 'English (Northern Mariana Islands)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_MS' => [
                'name' => 'English (Montserrat)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_MT' => [
                'name' => 'English (Malta)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_MU' => [
                'name' => 'English (Mauritius)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_MV' => [
                'name' => 'English (Maldives)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_MW' => [
                'name' => 'English (Malawi)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_MY' => [
                'name' => 'English (Malaysia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_NA' => [
                'name' => 'English (Namibia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_NF' => [
                'name' => 'English (Norfolk Island)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_NG' => [
                'name' => 'English (Nigeria)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_NL' => [
                'name' => 'English (Netherlands)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_NR' => [
                'name' => 'English (Nauru)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_NU' => [
                'name' => 'English (Niue)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_NZ' => [
                'name' => 'English (New Zealand)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_PG' => [
                'name' => 'English (Papua New Guinea)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_PH' => [
                'name' => 'English (Philippines)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_PK' => [
                'name' => 'English (Pakistan)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_PN' => [
                'name' => 'English (Pitcairn Islands)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_PR' => [
                'name' => 'English (Puerto Rico)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_PW' => [
                'name' => 'English (Palau)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_RW' => [
                'name' => 'English (Rwanda)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_SB' => [
                'name' => 'English (Solomon Islands)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_SC' => [
                'name' => 'English (Seychelles)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_SD' => [
                'name' => 'English (Sudan)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_SE' => [
                'name' => 'English (Sweden)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_SG' => [
                'name' => 'English (Singapore)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_SH' => [
                'name' => 'English (St. Helena)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_SI' => [
                'name' => 'English (Slovenia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_SL' => [
                'name' => 'English (Sierra Leone)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_SS' => [
                'name' => 'English (South Sudan)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_SX' => [
                'name' => 'English (Sint Maarten)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_SZ' => [
                'name' => 'English (Swaziland)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_TC' => [
                'name' => 'English (Turks & Caicos Islands)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_TK' => [
                'name' => 'English (Tokelau)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_TO' => [
                'name' => 'English (Tonga)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_TT' => [
                'name' => 'English (Trinidad & Tobago)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_TV' => [
                'name' => 'English (Tuvalu)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_TZ' => [
                'name' => 'English (Tanzania)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_UG' => [
                'name' => 'English (Uganda)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_UM' => [
                'name' => 'English (U.S. Outlying Islands)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_US' => [
                'name' => 'English (United States)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_US_POSIX' => [
                'name' => 'English (United States, Computer)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_VC' => [
                'name' => 'English (St. Vincent & Grenadines)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_VG' => [
                'name' => 'English (British Virgin Islands)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_VI' => [
                'name' => 'English (U.S. Virgin Islands)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_VU' => [
                'name' => 'English (Vanuatu)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_WS' => [
                'name' => 'English (Samoa)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_ZA' => [
                'name' => 'English (South Africa)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_ZM' => [
                'name' => 'English (Zambia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'en_ZW' => [
                'name' => 'English (Zimbabwe)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'eo' => [
                'name' => 'Esperanto',
                'dir' => 'ltr',
                'full' => false,
            ],
            'eo_001' => [
                'name' => 'Esperanto (mondo)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es' => [
                'name' => 'español',
                'dir' => 'ltr',
                'full' => false,
            ],
            'es_419' => [
                'name' => 'español (Latinoamérica)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_AR' => [
                'name' => 'español (Argentina)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_BO' => [
                'name' => 'español (Bolivia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_BR' => [
                'name' => 'español (Brasil)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_BZ' => [
                'name' => 'español (Belice)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_CL' => [
                'name' => 'español (Chile)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_CO' => [
                'name' => 'español (Colombia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_CR' => [
                'name' => 'español (Costa Rica)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_CU' => [
                'name' => 'español (Cuba)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_DO' => [
                'name' => 'español (República Dominicana)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_EA' => [
                'name' => 'español (Ceuta y Melilla)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_EC' => [
                'name' => 'español (Ecuador)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_ES' => [
                'name' => 'español (España)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_GQ' => [
                'name' => 'español (Guinea Ecuatorial)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_GT' => [
                'name' => 'español (Guatemala)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_HN' => [
                'name' => 'español (Honduras)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_IC' => [
                'name' => 'español (Canarias)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_MX' => [
                'name' => 'español (México)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_NI' => [
                'name' => 'español (Nicaragua)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_PA' => [
                'name' => 'español (Panamá)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_PE' => [
                'name' => 'español (Perú)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_PH' => [
                'name' => 'español (Filipinas)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_PR' => [
                'name' => 'español (Puerto Rico)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_PY' => [
                'name' => 'español (Paraguay)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_SV' => [
                'name' => 'español (El Salvador)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_US' => [
                'name' => 'español (Estados Unidos)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_UY' => [
                'name' => 'español (Uruguay)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'es_VE' => [
                'name' => 'español (Venezuela)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'et' => [
                'name' => 'eesti',
                'dir' => 'ltr',
                'full' => false,
            ],
            'et_EE' => [
                'name' => 'eesti (Eesti)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'eu' => [
                'name' => 'euskara',
                'dir' => 'ltr',
                'full' => false,
            ],
            'eu_ES' => [
                'name' => 'euskara (Espainia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ewo' => [
                'name' => 'ewondo',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ewo_CM' => [
                'name' => 'ewondo (Kamərún)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fa' => [
                'name' => 'فارسی',
                'dir' => 'rtl',
                'full' => false,
            ],
            'fa_AF' => [
                'name' => 'فارسی (افغانستان)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'fa_IR' => [
                'name' => 'فارسی (ایران)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ff' => [
                'name' => 'Pulaar',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ff_Adlm' => [
                'name' => '𞤆𞤵𞤤𞤢𞤪',
                'dir' => 'rtl',
                'full' => false,
            ],
            'ff_Adlm_BF' => [
                'name' => '𞤆𞤵𞤤𞤢𞤪 (𞤄𞤵𞤪𞤳𞤭𞤲𞤢 𞤊𞤢𞤧𞤮𞥅)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ff_Adlm_CM' => [
                'name' => '𞤆𞤵𞤤𞤢𞤪 (𞤑𞤢𞤥𞤢𞤪𞤵𞥅𞤲)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ff_Adlm_GH' => [
                'name' => '𞤆𞤵𞤤𞤢𞤪 (𞤘𞤢𞤲𞤢)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ff_Adlm_GM' => [
                'name' => '𞤆𞤵𞤤𞤢𞤪 (𞤘𞤢𞤥𞤦𞤭𞤴𞤢)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ff_Adlm_GN' => [
                'name' => '𞤆𞤵𞤤𞤢𞤪 (𞤘𞤭𞤲𞤫)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ff_Adlm_GW' => [
                'name' => '𞤆𞤵𞤤𞤢𞤪 (𞤘𞤭𞤲𞤫-𞤄𞤭𞤧𞤢𞤱𞤮𞥅)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ff_Adlm_LR' => [
                'name' => '𞤆𞤵𞤤𞤢𞤪 (𞤂𞤢𞤦𞤭𞤪𞤭𞤴𞤢𞥄)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ff_Adlm_MR' => [
                'name' => '𞤆𞤵𞤤𞤢𞤪 (𞤃𞤮𞤪𞤼𞤢𞤲𞤭𞥅)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ff_Adlm_NE' => [
                'name' => '𞤆𞤵𞤤𞤢𞤪 (𞤐𞤭𞥅𞤶𞤫𞤪)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ff_Adlm_NG' => [
                'name' => '𞤆𞤵𞤤𞤢𞤪 (𞤐𞤢𞤶𞤫𞤪𞤭𞤴𞤢𞥄)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ff_Adlm_SL' => [
                'name' => '𞤆𞤵𞤤𞤢𞤪 (𞤅𞤢𞤪𞤢𞤤𞤮𞤲)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ff_Adlm_SN' => [
                'name' => '𞤆𞤵𞤤𞤢𞤪 (𞤅𞤫𞤲𞤫𞤺𞤢𞥄𞤤)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ff_CM' => [
                'name' => 'Pulaar (Kameruun)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ff_GN' => [
                'name' => 'Pulaar (Gine)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ff_Latn' => [
                'name' => 'Pulaar',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ff_Latn_BF' => [
                'name' => 'Pulaar (Burkibaa Faaso)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ff_Latn_CM' => [
                'name' => 'Pulaar (Kameruun)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ff_Latn_GH' => [
                'name' => 'Pulaar (Ganaa)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ff_Latn_GM' => [
                'name' => 'Pulaar (Gammbi)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ff_Latn_GN' => [
                'name' => 'Pulaar (Gine)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ff_Latn_GW' => [
                'name' => 'Pulaar ( Gine-Bisaawo)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ff_Latn_LR' => [
                'name' => 'Pulaar (Liberiyaa)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ff_Latn_MR' => [
                'name' => 'Pulaar (Muritani)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ff_Latn_NE' => [
                'name' => 'Pulaar (Nijeer)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ff_Latn_NG' => [
                'name' => 'Pulaar (Nijeriyaa)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ff_Latn_SL' => [
                'name' => 'Pulaar (Seraa liyon)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ff_Latn_SN' => [
                'name' => 'Pulaar (Senegaal)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ff_MR' => [
                'name' => 'Pulaar (Muritani)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ff_SN' => [
                'name' => 'Pulaar (Senegaal)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'fi' => [
                'name' => 'suomi',
                'dir' => 'ltr',
                'full' => false,
            ],
            'fi_FI' => [
                'name' => 'suomi (Suomi)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fil' => [
                'name' => 'Filipino',
                'dir' => 'ltr',
                'full' => false,
            ],
            'fil_PH' => [
                'name' => 'Filipino (Pilipinas)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fo' => [
                'name' => 'føroyskt',
                'dir' => 'ltr',
                'full' => false,
            ],
            'fo_DK' => [
                'name' => 'føroyskt (Danmark)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fo_FO' => [
                'name' => 'føroyskt (Føroyar)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr' => [
                'name' => 'français',
                'dir' => 'ltr',
                'full' => false,
            ],
            'fr_BE' => [
                'name' => 'français (Belgique)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_BF' => [
                'name' => 'français (Burkina Faso)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_BI' => [
                'name' => 'français (Burundi)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_BJ' => [
                'name' => 'français (Bénin)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_BL' => [
                'name' => 'français (Saint_Barthélemy)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_CA' => [
                'name' => 'français (Canada)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_CD' => [
                'name' => 'français (Congo_Kinshasa)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_CF' => [
                'name' => 'français (République centrafricaine)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_CG' => [
                'name' => 'français (Congo_Brazzaville)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_CH' => [
                'name' => 'français (Suisse)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_CI' => [
                'name' => 'français (Côte d’Ivoire)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_CM' => [
                'name' => 'français (Cameroun)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_DJ' => [
                'name' => 'français (Djibouti)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_DZ' => [
                'name' => 'français (Algérie)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_FR' => [
                'name' => 'français (France)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_GA' => [
                'name' => 'français (Gabon)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_GF' => [
                'name' => 'français (Guyane française)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_GN' => [
                'name' => 'français (Guinée)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_GP' => [
                'name' => 'français (Guadeloupe)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_GQ' => [
                'name' => 'français (Guinée équatoriale)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_HT' => [
                'name' => 'français (Haïti)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_KM' => [
                'name' => 'français (Comores)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_LU' => [
                'name' => 'français (Luxembourg)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_MA' => [
                'name' => 'français (Maroc)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_MC' => [
                'name' => 'français (Monaco)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_MF' => [
                'name' => 'français (Saint_Martin)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_MG' => [
                'name' => 'français (Madagascar)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_ML' => [
                'name' => 'français (Mali)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_MQ' => [
                'name' => 'français (Martinique)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_MR' => [
                'name' => 'français (Mauritanie)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_MU' => [
                'name' => 'français (Maurice)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_NC' => [
                'name' => 'français (Nouvelle_Calédonie)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_NE' => [
                'name' => 'français (Niger)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_PF' => [
                'name' => 'français (Polynésie française)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_PM' => [
                'name' => 'français (Saint_Pierre_et_Miquelon)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_RE' => [
                'name' => 'français (La Réunion)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_RW' => [
                'name' => 'français (Rwanda)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_SC' => [
                'name' => 'français (Seychelles)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_SN' => [
                'name' => 'français (Sénégal)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_SY' => [
                'name' => 'français (Syrie)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_TD' => [
                'name' => 'français (Tchad)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_TG' => [
                'name' => 'français (Togo)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_TN' => [
                'name' => 'français (Tunisie)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_VU' => [
                'name' => 'français (Vanuatu)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_WF' => [
                'name' => 'français (Wallis_et_Futuna)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fr_YT' => [
                'name' => 'français (Mayotte)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fur' => [
                'name' => 'furlan',
                'dir' => 'ltr',
                'full' => false,
            ],
            'fur_IT' => [
                'name' => 'furlan (Italie)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'fy' => [
                'name' => 'Frysk',
                'dir' => 'ltr',
                'full' => false,
            ],
            'fy_NL' => [
                'name' => 'Frysk (Nederlân)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ga' => [
                'name' => 'Gaeilge',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ga_GB' => [
                'name' => 'Gaeilge (an Ríocht Aontaithe)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ga_IE' => [
                'name' => 'Gaeilge (Éire)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'gd' => [
                'name' => 'Gàidhlig',
                'dir' => 'ltr',
                'full' => false,
            ],
            'gd_GB' => [
                'name' => 'Gàidhlig (An Rìoghachd Aonaichte)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'gl' => [
                'name' => 'galego',
                'dir' => 'ltr',
                'full' => false,
            ],
            'gl_ES' => [
                'name' => 'galego (España)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'gsw' => [
                'name' => 'Schwiizertüütsch',
                'dir' => 'ltr',
                'full' => false,
            ],
            'gsw_CH' => [
                'name' => 'Schwiizertüütsch (Schwiiz)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'gsw_FR' => [
                'name' => 'Schwiizertüütsch (Frankriich)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'gsw_LI' => [
                'name' => 'Schwiizertüütsch (Liächteschtäi)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'gu' => [
                'name' => 'ગુજરાતી',
                'dir' => 'ltr',
                'full' => false,
            ],
            'gu_IN' => [
                'name' => 'ગુજરાતી (ભારત)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'guz_KE' => [
                'name' => 'Ekegusii (Kenya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'gv' => [
                'name' => 'Gaelg',
                'dir' => 'ltr',
                'full' => false,
            ],
            'gv_IM' => [
                'name' => 'Gaelg (Ellan Vannin)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ha' => [
                'name' => 'Hausa',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ha_GH' => [
                'name' => 'Hausa (Gana)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ha_NE' => [
                'name' => 'Hausa (Nijar)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ha_NG' => [
                'name' => 'Hausa (Najeriya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'haw' => [
                'name' => 'ʻŌlelo Hawaiʻi',
                'dir' => 'ltr',
                'full' => false,
            ],
            'haw_US' => [
                'name' => 'ʻŌlelo Hawaiʻi (ʻAmelika Hui Pū ʻIa)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'he' => [
                'name' => 'עברית',
                'dir' => 'rtl',
                'full' => false,
            ],
            'he_IL' => [
                'name' => 'עברית (ישראל)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'hi' => [
                'name' => 'हिन्दी',
                'dir' => 'ltr',
                'full' => false,
            ],
            'hi_IN' => [
                'name' => 'हिन्दी (भारत)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'hi_Latn' => [
                'name' => 'Hindi',
                'dir' => 'ltr',
                'full' => false,
            ],
            'hi_Latn_IN' => [
                'name' => 'Hindi (India)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'hr' => [
                'name' => 'hrvatski',
                'dir' => 'ltr',
                'full' => false,
            ],
            'hr_BA' => [
                'name' => 'hrvatski (Bosna i Hercegovina)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'hr_HR' => [
                'name' => 'hrvatski (Hrvatska)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'hsb' => [
                'name' => 'hornjoserbšćina',
                'dir' => 'ltr',
                'full' => false,
            ],
            'hsb_DE' => [
                'name' => 'hornjoserbšćina (Němska)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'hu' => [
                'name' => 'magyar',
                'dir' => 'ltr',
                'full' => false,
            ],
            'hu_HU' => [
                'name' => 'magyar (Magyarország)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'hy' => [
                'name' => 'հայերեն',
                'dir' => 'ltr',
                'full' => false,
            ],
            'hy_AM' => [
                'name' => 'հայերեն (Հայաստան)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ia' => [
                'name' => 'interlingua',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ia_001' => [
                'name' => 'interlingua (Mundo)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'id' => [
                'name' => 'Indonesia',
                'dir' => 'ltr',
                'full' => false,
            ],
            'id_ID' => [
                'name' => 'Indonesia (Indonesia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ie' => [
                'name' => 'Interlingue',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ie_EE' => [
                'name' => 'Interlingue (Estonia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ig' => [
                'name' => 'Igbo',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ig_NG' => [
                'name' => 'Igbo (Naịjịrịa)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ii' => [
                'name' => 'ꆈꌠꉙ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ii_CN' => [
                'name' => 'ꆈꌠꉙ (ꍏꇩ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'is' => [
                'name' => 'íslenska',
                'dir' => 'ltr',
                'full' => false,
            ],
            'is_IS' => [
                'name' => 'íslenska (Ísland)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'it' => [
                'name' => 'italiano',
                'dir' => 'ltr',
                'full' => false,
            ],
            'it_CH' => [
                'name' => 'italiano (Svizzera)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'it_IT' => [
                'name' => 'italiano (Italia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'it_SM' => [
                'name' => 'italiano (San Marino)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'it_VA' => [
                'name' => 'italiano (Città del Vaticano)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ja' => [
                'name' => '日本語',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ja_JP' => [
                'name' => '日本語 (日本)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'jgo' => [
                'name' => 'Ndaꞌa',
                'dir' => 'ltr',
                'full' => false,
            ],
            'jgo_CM' => [
                'name' => 'Ndaꞌa (Kamɛlûn)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'jmc' => [
                'name' => 'Kimachame',
                'dir' => 'ltr',
                'full' => false,
            ],
            'jmc_TZ' => [
                'name' => 'Kimachame (Tanzania)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'jv' => [
                'name' => 'Jawa',
                'dir' => 'ltr',
                'full' => false,
            ],
            'jv_ID' => [
                'name' => 'Jawa (Indonésia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ka' => [
                'name' => 'ქართული',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ka_GE' => [
                'name' => 'ქართული (საქართველო)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'kab' => [
                'name' => 'Taqbaylit',
                'dir' => 'ltr',
                'full' => false,
            ],
            'kab_DZ' => [
                'name' => 'Taqbaylit (Lezzayer)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'kam' => [
                'name' => 'Kikamba',
                'dir' => 'ltr',
                'full' => false,
            ],
            'kam_KE' => [
                'name' => 'Kikamba (Kenya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'kde' => [
                'name' => 'Chimakonde',
                'dir' => 'ltr',
                'full' => false,
            ],
            'kde_TZ' => [
                'name' => 'Chimakonde (Tanzania)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'kea' => [
                'name' => 'kabuverdianu',
                'dir' => 'ltr',
                'full' => false,
            ],
            'kea_CV' => [
                'name' => 'kabuverdianu (Kabu Verdi)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'khq' => [
                'name' => 'Koyra ciini',
                'dir' => 'ltr',
                'full' => false,
            ],
            'khq_ML' => [
                'name' => 'Koyra ciini (Maali)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ki' => [
                'name' => 'Gikuyu',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ki_KE' => [
                'name' => 'Gikuyu (Kenya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'kk' => [
                'name' => 'қазақ тілі',
                'dir' => 'ltr',
                'full' => false,
            ],
            'kk_KZ' => [
                'name' => 'қазақ тілі (Қазақстан)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'kkj' => [
                'name' => 'kakɔ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'kkj_CM' => [
                'name' => 'kakɔ (Kamɛrun)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'kl' => [
                'name' => 'kalaallisut',
                'dir' => 'ltr',
                'full' => false,
            ],
            'kl_GL' => [
                'name' => 'kalaallisut (Kalaallit Nunaat)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'kln' => [
                'name' => 'Kalenjin',
                'dir' => 'ltr',
                'full' => false,
            ],
            'kln_KE' => [
                'name' => 'Kalenjin (Emetab Kenya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'km' => [
                'name' => 'ខ្មែរ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'km_KH' => [
                'name' => 'ខ្មែរ (កម្ពុជា)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'kn' => [
                'name' => 'ಕನ್ನಡ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'kn_IN' => [
                'name' => 'ಕನ್ನಡ (ಭಾರತ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ko' => [
                'name' => '한국어',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ko_CN' => [
                'name' => '한국어(중국)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ko_KP' => [
                'name' => '한국어(조선민주주의인민공화국)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ko_KR' => [
                'name' => '한국어(대한민국)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'kok' => [
                'name' => 'कोंकणी',
                'dir' => 'ltr',
                'full' => false,
            ],
            'kok_IN' => [
                'name' => 'कोंकणी (भारत)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ks' => [
                'name' => 'کٲشُر',
                'dir' => 'rtl',
                'full' => false,
            ],
            'ks_Arab' => [
                'name' => 'کٲشُر',
                'dir' => 'rtl',
                'full' => false,
            ],
            'ks_Arab_IN' => [
                'name' => 'کٲشُر (عربی, ہِندوستان)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ks_Deva' => [
                'name' => 'कॉशुर',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ks_Deva_IN' => [
                'name' => 'कॉशुर (हिंदोस्तान)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ks_IN' => [
                'name' => 'کٲشُر (ہِنٛدوستان)',
                'dir' => 'rtl',
                'full' => false,
            ],
            'ksb' => [
                'name' => 'Kishambaa',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ksb_TZ' => [
                'name' => 'Kishambaa (Tanzania)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ksf' => [
                'name' => 'rikpa',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ksf_CM' => [
                'name' => 'rikpa (kamɛrún)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ksh' => [
                'name' => 'Kölsch',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ksh_DE' => [
                'name' => 'Kölsch en Doütschland',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ku' => [
                'name' => 'kurdî [kurmancî]',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ku_TR' => [
                'name' => 'kurdî [kurmancî] (Tirkiye)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'kw' => [
                'name' => 'kernewek',
                'dir' => 'ltr',
                'full' => false,
            ],
            'kw_GB' => [
                'name' => 'kernewek (Rywvaneth Unys)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ky' => [
                'name' => 'кыргызча',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ky_KG' => [
                'name' => 'кыргызча (Кыргызстан)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'lag' => [
                'name' => 'Kɨlaangi',
                'dir' => 'ltr',
                'full' => false,
            ],
            'lag_TZ' => [
                'name' => 'Kɨlaangi (Taansanía)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'lb' => [
                'name' => 'Lëtzebuergesch',
                'dir' => 'ltr',
                'full' => false,
            ],
            'lb_LU' => [
                'name' => 'Lëtzebuergesch (Lëtzebuerg)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'lg' => [
                'name' => 'Luganda',
                'dir' => 'ltr',
                'full' => false,
            ],
            'lg_UG' => [
                'name' => 'Luganda (Yuganda)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'lkt' => [
                'name' => 'Lakȟólʼiyapi',
                'dir' => 'ltr',
                'full' => false,
            ],
            'lkt_US' => [
                'name' => 'Lakȟólʼiyapi (Mílahaŋska Tȟamákȟočhe)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ln' => [
                'name' => 'lingála',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ln_AO' => [
                'name' => 'lingála (Angóla)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ln_CD' => [
                'name' => 'lingála (Republíki ya Kongó Demokratíki)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ln_CF' => [
                'name' => 'lingála (Repibiki ya Afríka ya Káti)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ln_CG' => [
                'name' => 'lingála (Kongo)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'lo' => [
                'name' => 'ລາວ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'lo_LA' => [
                'name' => 'ລາວ (ລາວ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'lrc' => [
                'name' => 'لۊری شومالی',
                'dir' => 'rtl',
                'full' => false,
            ],
            'lrc_IQ' => [
                'name' => 'لۊری شومالی (IQ)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'lrc_IR' => [
                'name' => 'لۊری شومالی (IR)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'lt' => [
                'name' => 'lietuvių',
                'dir' => 'ltr',
                'full' => false,
            ],
            'lt_LT' => [
                'name' => 'lietuvių (Lietuva)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'lu' => [
                'name' => 'Tshiluba',
                'dir' => 'ltr',
                'full' => false,
            ],
            'lu_CD' => [
                'name' => 'Tshiluba (Ditunga wa Kongu)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'luo' => [
                'name' => 'Dholuo',
                'dir' => 'ltr',
                'full' => false,
            ],
            'luo_KE' => [
                'name' => 'Dholuo (Kenya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'luy' => [
                'name' => 'Luluhia',
                'dir' => 'ltr',
                'full' => false,
            ],
            'luy_KE' => [
                'name' => 'Luluhia (Kenya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'lv' => [
                'name' => 'latviešu',
                'dir' => 'ltr',
                'full' => false,
            ],
            'lv_LV' => [
                'name' => 'latviešu (Latvija)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mas' => [
                'name' => 'Maa',
                'dir' => 'ltr',
                'full' => false,
            ],
            'mas_KE' => [
                'name' => 'Maa (Kenya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mas_TZ' => [
                'name' => 'Maa (Tansania)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mer' => [
                'name' => 'Kĩmĩrũ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'mer_KE' => [
                'name' => 'Kĩmĩrũ (Kenya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mfe' => [
                'name' => 'kreol morisien',
                'dir' => 'ltr',
                'full' => false,
            ],
            'mfe_MU' => [
                'name' => 'kreol morisien (Moris)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mg' => [
                'name' => 'Malagasy',
                'dir' => 'ltr',
                'full' => false,
            ],
            'mg_MG' => [
                'name' => 'Malagasy (Madagasikara)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mgh' => [
                'name' => 'Makua',
                'dir' => 'ltr',
                'full' => false,
            ],
            'mgh_MZ' => [
                'name' => 'Makua (Umozambiki)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mgo' => [
                'name' => 'metaʼ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'mgo_CM' => [
                'name' => 'metaʼ (Kamalun)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mi' => [
                'name' => 'Māori',
                'dir' => 'ltr',
                'full' => false,
            ],
            'mi_NZ' => [
                'name' => 'Māori (Aotearoa)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mk' => [
                'name' => 'македонски',
                'dir' => 'ltr',
                'full' => false,
            ],
            'mk_MK' => [
                'name' => 'македонски (Македонија)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ml' => [
                'name' => 'മലയാളം',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ml_IN' => [
                'name' => 'മലയാളം (ഇന്ത്യ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mn' => [
                'name' => 'монгол',
                'dir' => 'ltr',
                'full' => false,
            ],
            'mn_MN' => [
                'name' => 'монгол (Монгол)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mr' => [
                'name' => 'मराठी',
                'dir' => 'ltr',
                'full' => false,
            ],
            'mr_IN' => [
                'name' => 'मराठी (भारत)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ms' => [
                'name' => 'Melayu',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ms_BN' => [
                'name' => 'Melayu (Brunei)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ms_ID' => [
                'name' => 'Melayu (Indonesia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ms_MY' => [
                'name' => 'Melayu (Malaysia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ms_SG' => [
                'name' => 'Melayu (Singapura)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mt' => [
                'name' => 'Malti',
                'dir' => 'ltr',
                'full' => false,
            ],
            'mt_MT' => [
                'name' => 'Malti (Malta)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mua' => [
                'name' => 'MUNDAŊ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'mua_CM' => [
                'name' => 'MUNDAŊ (kameruŋ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'my' => [
                'name' => 'မြန်မာ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'my_MM' => [
                'name' => 'မြန်မာ (မြန်မာ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'mzn' => [
                'name' => 'مازرونی',
                'dir' => 'rtl',
                'full' => false,
            ],
            'mzn_IR' => [
                'name' => 'مازرونی (ایران)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'naq' => [
                'name' => 'Khoekhoegowab',
                'dir' => 'ltr',
                'full' => false,
            ],
            'naq_NA' => [
                'name' => 'Khoekhoegowab (Namibiab)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nb' => [
                'name' => 'norsk bokmål',
                'dir' => 'ltr',
                'full' => false,
            ],
            'nb_NO' => [
                'name' => 'norsk bokmål (Norge)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nb_SJ' => [
                'name' => 'norsk bokmål (Svalbard og Jan Mayen)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nd' => [
                'name' => 'isiNdebele',
                'dir' => 'ltr',
                'full' => false,
            ],
            'nd_ZW' => [
                'name' => 'isiNdebele (Zimbabwe)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nds' => [
                'name' => 'Plattdüütsch',
                'dir' => 'ltr',
                'full' => false,
            ],
            'nds_DE' => [
                'name' => 'Plattdüütsch (DE)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nds_NL' => [
                'name' => 'Plattdüütsch (NL)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ne' => [
                'name' => 'नेपाली',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ne_IN' => [
                'name' => 'नेपाली (भारत)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ne_NP' => [
                'name' => 'नेपाली (नेपाल)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nl' => [
                'name' => 'Nederlands',
                'dir' => 'ltr',
                'full' => false,
            ],
            'nl_AW' => [
                'name' => 'Nederlands (Aruba)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nl_BE' => [
                'name' => 'Nederlands (België)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nl_BQ' => [
                'name' => 'Nederlands (Caribisch Nederland)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nl_CW' => [
                'name' => 'Nederlands (Curaçao)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nl_NL' => [
                'name' => 'Nederlands (Nederland)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nl_SR' => [
                'name' => 'Nederlands (Suriname)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nl_SX' => [
                'name' => 'Nederlands (Sint_Maarten)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nmg' => [
                'name' => 'Kwasio',
                'dir' => 'ltr',
                'full' => false,
            ],
            'nmg_CM' => [
                'name' => 'Kwasio (Kamerun)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nn' => [
                'name' => 'nynorsk',
                'dir' => 'ltr',
                'full' => false,
            ],
            'nn_NO' => [
                'name' => 'nynorsk (Noreg)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nnh' => [
                'name' => 'Shwóŋò ngiembɔɔn',
                'dir' => 'ltr',
                'full' => false,
            ],
            'nnh_CM' => [
                'name' => 'Shwóŋò ngiembɔɔn (Kàmalûm)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'no' => [
                'name' => 'norsk',
                'dir' => 'ltr',
                'full' => false,
            ],
            'no_NO' => [
                'name' => 'norsk (Norge)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nus' => [
                'name' => 'Thok Nath',
                'dir' => 'ltr',
                'full' => false,
            ],
            'nus_SS' => [
                'name' => 'Thok Nath (SS)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'nyn' => [
                'name' => 'Runyankore',
                'dir' => 'ltr',
                'full' => false,
            ],
            'nyn_UG' => [
                'name' => 'Runyankore (Uganda)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'oc' => [
                'name' => 'occitan',
                'dir' => 'ltr',
                'full' => false,
            ],
            'oc_ES' => [
                'name' => 'occitan (Espanha)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'oc_FR' => [
                'name' => 'occitan (França)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'om' => [
                'name' => 'Oromoo',
                'dir' => 'ltr',
                'full' => false,
            ],
            'om_ET' => [
                'name' => 'Oromoo (Itoophiyaa)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'om_KE' => [
                'name' => 'Oromoo (Keeniyaa)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'or' => [
                'name' => 'ଓଡ଼ିଆ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'or_IN' => [
                'name' => 'ଓଡ଼ିଆ (ଭାରତ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'os' => [
                'name' => 'ирон',
                'dir' => 'ltr',
                'full' => false,
            ],
            'os_GE' => [
                'name' => 'ирон (Гуырдзыстон)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'os_RU' => [
                'name' => 'ирон (Уӕрӕсе)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'pa' => [
                'name' => 'ਪੰਜਾਬੀ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'pa_Arab' => [
                'name' => 'پنجابی',
                'dir' => 'rtl',
                'full' => false,
            ],
            'pa_Arab_PK' => [
                'name' => 'پنجابی (پاکستان)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'pa_Guru' => [
                'name' => 'ਪੰਜਾਬੀ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'pa_Guru_IN' => [
                'name' => 'ਪੰਜਾਬੀ (ਭਾਰਤ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'pa_IN' => [
                'name' => 'ਪੰਜਾਬੀ (ਭਾਰਤ)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'pa_PK' => [
                'name' => 'پنجابی (پاکستان)',
                'dir' => 'rtl',
                'full' => false,
            ],
            'pl' => [
                'name' => 'polski',
                'dir' => 'ltr',
                'full' => false,
            ],
            'pl_PL' => [
                'name' => 'polski (Polska)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ps' => [
                'name' => 'پښتو',
                'dir' => 'rtl',
                'full' => false,
            ],
            'ps_AF' => [
                'name' => 'پښتو (افغانستان)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'ps_PK' => [
                'name' => 'پښتو (پاکستان)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'pt' => [
                'name' => 'português',
                'dir' => 'ltr',
                'full' => false,
            ],
            'pt_AO' => [
                'name' => 'português (Angola)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'pt_BR' => [
                'name' => 'português (Brasil)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'pt_CH' => [
                'name' => 'português (Suíça)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'pt_CV' => [
                'name' => 'português (Cabo Verde)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'pt_GQ' => [
                'name' => 'português (Guiné Equatorial)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'pt_GW' => [
                'name' => 'português (Guiné_Bissau)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'pt_LU' => [
                'name' => 'português (Luxemburgo)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'pt_MO' => [
                'name' => 'português (Macau, RAE da China)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'pt_MZ' => [
                'name' => 'português (Moçambique)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'pt_PT' => [
                'name' => 'português (Portugal)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'pt_ST' => [
                'name' => 'português (São Tomé e Príncipe)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'pt_TL' => [
                'name' => 'português (Timor_Leste)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'qu' => [
                'name' => 'Runasimi',
                'dir' => 'ltr',
                'full' => false,
            ],
            'qu_BO' => [
                'name' => 'Runasimi (Bolivia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'qu_EC' => [
                'name' => 'Runasimi (Ecuador)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'qu_PE' => [
                'name' => 'Runasimi (Perú)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'rm' => [
                'name' => 'rumantsch',
                'dir' => 'ltr',
                'full' => false,
            ],
            'rm_CH' => [
                'name' => 'rumantsch (Svizra)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'rn' => [
                'name' => 'Ikirundi',
                'dir' => 'ltr',
                'full' => false,
            ],
            'rn_BI' => [
                'name' => 'Ikirundi (Uburundi)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ro' => [
                'name' => 'română',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ro_MD' => [
                'name' => 'română (Republica Moldova)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ro_RO' => [
                'name' => 'română (România)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'rof' => [
                'name' => 'Kihorombo',
                'dir' => 'ltr',
                'full' => false,
            ],
            'rof_TZ' => [
                'name' => 'Kihorombo (Tanzania)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ru' => [
                'name' => 'русский',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ru_BY' => [
                'name' => 'русский (Беларусь)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ru_KG' => [
                'name' => 'русский (Киргизия)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ru_KZ' => [
                'name' => 'русский (Казахстан)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ru_MD' => [
                'name' => 'русский (Молдова)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ru_RU' => [
                'name' => 'русский (Россия)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ru_UA' => [
                'name' => 'русский (Украина)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'rw' => [
                'name' => 'Kinyarwanda',
                'dir' => 'ltr',
                'full' => false,
            ],
            'rw_RW' => [
                'name' => 'Kinyarwanda (U Rwanda)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'rwk' => [
                'name' => 'Kiruwa',
                'dir' => 'ltr',
                'full' => false,
            ],
            'rwk_TZ' => [
                'name' => 'Kiruwa (Tanzania)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sah' => [
                'name' => 'саха тыла',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sah_RU' => [
                'name' => 'саха тыла (Арассыыйа)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'saq' => [
                'name' => 'Kisampur',
                'dir' => 'ltr',
                'full' => false,
            ],
            'saq_KE' => [
                'name' => 'Kisampur (Kenya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sbp' => [
                'name' => 'Ishisangu',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sbp_TZ' => [
                'name' => 'Ishisangu (Tansaniya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sa' => [
                'name' => 'संस्कृत भाषा',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sa_IN' => [
                'name' => 'संस्कृत भाषा (भारतः)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sc' => [
                'name' => 'sardu',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sc_IT' => [
                'name' => 'sardu (Itàlia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sd' => [
                'name' => 'سنڌي',
                'dir' => 'rtl',
                'full' => false,
            ],
            'sd_Arab' => [
                'name' => 'سنڌي',
                'dir' => 'rtl',
                'full' => false,
            ],
            'sd_Arab_PK' => [
                'name' => 'سنڌي (پاڪستان)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'sd_Deva' => [
                'name' => 'सिन्धी',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sd_Deva_IN' => [
                'name' => 'सिन्धी (भारत)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sd_IN' => [
                'name' => 'सिन्धी (भारत)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sd_PK' => [
                'name' => 'سنڌي (پاڪستان)',
                'dir' => 'rtl',
                'full' => false,
            ],
            'se' => [
                'name' => 'davvisámegiella',
                'dir' => 'ltr',
                'full' => false,
            ],
            'se_FI' => [
                'name' => 'davvisámegiella (Suopma)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'se_NO' => [
                'name' => 'davvisámegiella (Norga)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'se_SE' => [
                'name' => 'davvisámegiella (Ruoŧŧa)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'seh' => [
                'name' => 'sena',
                'dir' => 'ltr',
                'full' => false,
            ],
            'seh_MZ' => [
                'name' => 'sena (Moçambique)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ses' => [
                'name' => 'Koyraboro senni',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ses_ML' => [
                'name' => 'Koyraboro senni (Maali)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sg' => [
                'name' => 'Sängö',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sg_CF' => [
                'name' => 'Sängö (Ködörösêse tî Bêafrîka)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sh' => [
                'name' => 'srpskohrvatski',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sh_BA' => [
                'name' => 'srpskohrvatski (Bosna i Hercegovina)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'shi' => [
                'name' => 'Tashelḥiyt',
                'dir' => 'ltr',
                'full' => false,
            ],
            'shi_Latn' => [
                'name' => 'Tashelḥiyt',
                'dir' => 'ltr',
                'full' => false,
            ],
            'shi_Latn_MA' => [
                'name' => 'Tashelḥiyt (lmɣrib)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'shi_Tfng' => [
                'name' => 'ⵜⴰⵛⵍⵃⵉⵜ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'shi_Tfng_MA' => [
                'name' => 'ⵜⴰⵛⵍⵃⵉⵜ (ⵍⵎⵖⵔⵉⴱ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'si' => [
                'name' => 'සිංහල',
                'dir' => 'ltr',
                'full' => false,
            ],
            'si_LK' => [
                'name' => 'සිංහල (ශ්‍රී ලංකාව)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sk' => [
                'name' => 'slovenčina',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sk_SK' => [
                'name' => 'slovenčina (Slovensko)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sl' => [
                'name' => 'slovenščina',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sl_SI' => [
                'name' => 'slovenščina (Slovenija)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'smn' => [
                'name' => 'anarâškielâ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'smn_FI' => [
                'name' => 'anarâškielâ (Suomâ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sn' => [
                'name' => 'chiShona',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sn_ZW' => [
                'name' => 'chiShona (Zimbabwe)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'so' => [
                'name' => 'Soomaali',
                'dir' => 'ltr',
                'full' => false,
            ],
            'so_DJ' => [
                'name' => 'Soomaali (Jabuuti)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'so_ET' => [
                'name' => 'Soomaali (Itoobiya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'so_KE' => [
                'name' => 'Soomaali (Kiiniya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'so_SO' => [
                'name' => 'Soomaali (Soomaaliya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sq' => [
                'name' => 'shqip',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sq_AL' => [
                'name' => 'shqip (Shqipëri)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sq_MK' => [
                'name' => 'shqip (Maqedoni)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sq_XK' => [
                'name' => 'shqip (Kosovë)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sr' => [
                'name' => 'српски',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sr_BA' => [
                'name' => 'српски (Босна и Херцеговина)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sr_Cyrl' => [
                'name' => 'српски',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sr_Cyrl_BA' => [
                'name' => 'српски (Босна и Херцеговина)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sr_Cyrl_ME' => [
                'name' => 'српски (Црна Гора)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sr_Cyrl_RS' => [
                'name' => 'српски (Србија)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sr_Latn' => [
                'name' => 'srpski',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sr_Latn_BA' => [
                'name' => 'srpski (Bosna i Hercegovina)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sr_Latn_ME' => [
                'name' => 'srpski (Crna Gora)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sr_Latn_RS' => [
                'name' => 'srpski (Srbija)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sr_ME' => [
                'name' => 'српски (Црна Гора)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sr_RS' => [
                'name' => 'српски (Србија)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'su' => [
                'name' => 'Basa Sunda',
                'dir' => 'ltr',
                'full' => false,
            ],
            'su_ID' => [
                'name' => 'Basa Sunda (Indonesia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sv' => [
                'name' => 'svenska',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sv_AX' => [
                'name' => 'svenska (Åland)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sv_FI' => [
                'name' => 'svenska (Finland)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sv_SE' => [
                'name' => 'svenska (Sverige)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sw' => [
                'name' => 'Kiswahili',
                'dir' => 'ltr',
                'full' => false,
            ],
            'sw_CD' => [
                'name' => 'Kiswahili (Jamhuri ya Kidemokrasia ya Kongo)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sw_KE' => [
                'name' => 'Kiswahili (Kenya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sw_TZ' => [
                'name' => 'Kiswahili (Tanzania)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'sw_UG' => [
                'name' => 'Kiswahili (Uganda)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ta' => [
                'name' => 'தமிழ்',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ta_IN' => [
                'name' => 'தமிழ் (இந்தியா)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ta_LK' => [
                'name' => 'தமிழ் (இலங்கை)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ta_MY' => [
                'name' => 'தமிழ் (மலேசியா)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ta_SG' => [
                'name' => 'தமிழ் (சிங்கப்பூர்)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'te' => [
                'name' => 'తెలుగు',
                'dir' => 'ltr',
                'full' => false,
            ],
            'te_IN' => [
                'name' => 'తెలుగు (భారతదేశం)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'teo' => [
                'name' => 'Kiteso',
                'dir' => 'ltr',
                'full' => false,
            ],
            'teo_KE' => [
                'name' => 'Kiteso (Kenia)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'teo_UG' => [
                'name' => 'Kiteso (Uganda)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'tg' => [
                'name' => 'тоҷикӣ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'tg_TJ' => [
                'name' => 'тоҷикӣ (Тоҷикистон)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'th' => [
                'name' => 'ไทย',
                'dir' => 'ltr',
                'full' => false,
            ],
            'th_TH' => [
                'name' => 'ไทย (ไทย)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ti' => [
                'name' => 'ትግርኛ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ti_ER' => [
                'name' => 'ትግርኛ (ኤርትራ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'ti_ET' => [
                'name' => 'ትግርኛ (ኢትዮጵያ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'tk' => [
                'name' => 'türkmen dili',
                'dir' => 'ltr',
                'full' => false,
            ],
            'tk_TM' => [
                'name' => 'türkmen dili (Türkmenistan)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'tl' => [
                'name' => 'Tagalog',
                'dir' => 'ltr',
                'full' => false,
            ],
            'tl_PH' => [
                'name' => 'Tagalog (Pilipinas)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'to' => [
                'name' => 'lea fakatonga',
                'dir' => 'ltr',
                'full' => false,
            ],
            'to_TO' => [
                'name' => 'lea fakatonga (Tonga)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'tr' => [
                'name' => 'Türkçe',
                'dir' => 'ltr',
                'full' => false,
            ],
            'tr_CY' => [
                'name' => 'Türkçe (Kıbrıs)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'tr_TR' => [
                'name' => 'Türkçe (Türkiye)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'tt' => [
                'name' => 'татар',
                'dir' => 'ltr',
                'full' => false,
            ],
            'tt_RU' => [
                'name' => 'татар (Россия)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'twq' => [
                'name' => 'Tasawaq senni',
                'dir' => 'ltr',
                'full' => false,
            ],
            'twq_NE' => [
                'name' => 'Tasawaq senni (Nižer)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'tzm' => [
                'name' => 'Tamaziɣt n laṭlaṣ',
                'dir' => 'ltr',
                'full' => false,
            ],
            'tzm_MA' => [
                'name' => 'Tamaziɣt n laṭlaṣ (Meṛṛuk)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ug' => [
                'name' => 'ئۇيغۇرچە',
                'dir' => 'rtl',
                'full' => false,
            ],
            'ug_CN' => [
                'name' => 'ئۇيغۇرچە (جۇڭگو)',
                'dir' => 'rtl',
                'full' => false,
            ],
            'uk' => [
                'name' => 'українська',
                'dir' => 'ltr',
                'full' => false,
            ],
            'uk_RU' => [
                'name' => 'українська (Росія)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'uk_UA' => [
                'name' => 'українська (Україна)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'ur' => [
                'name' => 'اردو',
                'dir' => 'rtl',
                'full' => false,
            ],
            'ur_IN' => [
                'name' => 'اردو (بھارت)',
                'dir' => 'rtl',
                'full' => false,
            ],
            'ur_PK' => [
                'name' => 'اردو (پاکستان)',
                'dir' => 'rtl',
                'full' => false,
            ],
            'uz' => [
                'name' => 'o‘zbek',
                'dir' => 'ltr',
                'full' => false,
            ],
            'uz_AF' => [
                'name' => 'اوزبیک (افغانستان)',
                'dir' => 'rtl',
                'full' => false,
            ],
            'uz_Arab' => [
                'name' => 'اوزبیک',
                'dir' => 'rtl',
                'full' => false,
            ],
            'uz_Arab_AF' => [
                'name' => 'اوزبیک (افغانستان)',
                'dir' => 'rtl',
                'full' => false,
            ],
            'uz_Cyrl' => [
                'name' => 'ўзбекча',
                'dir' => 'ltr',
                'full' => false,
            ],
            'uz_Cyrl_UZ' => [
                'name' => 'ўзбекча (Ўзбекистон)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'uz_Latn' => [
                'name' => 'o‘zbek',
                'dir' => 'ltr',
                'full' => false,
            ],
            'uz_Latn_UZ' => [
                'name' => 'o‘zbek (Oʻzbekiston)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'uz_UZ' => [
                'name' => 'o‘zbek (Oʻzbekiston)',
                'dir' => 'ltr',
                'full' => false,
            ],
            'vai' => [
                'name' => 'Vai',
                'dir' => 'ltr',
                'full' => false,
            ],
            'vai_Latn_LR' => [
                'name' => 'Vai (Laibhiya)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'vai_Vaii_LR' => [
                'name' => 'ꕙꔤ (ꕞꔤꔫꕩ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'vi' => [
                'name' => 'Tiếng Việt',
                'dir' => 'ltr',
                'full' => false,
            ],
            'vi_VN' => [
                'name' => 'Tiếng Việt (Việt Nam)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'vun' => [
                'name' => 'Kyivunjo',
                'dir' => 'ltr',
                'full' => false,
            ],
            'vun_TZ' => [
                'name' => 'Kyivunjo (Tanzania)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'wae' => [
                'name' => 'Walser',
                'dir' => 'ltr',
                'full' => false,
            ],
            'wae_CH' => [
                'name' => 'Walser (Schwiz)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'wo' => [
                'name' => 'Wolof',
                'dir' => 'ltr',
                'full' => false,
            ],
            'wo_SN' => [
                'name' => 'Wolof (Senegaal)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'xh' => [
                'name' => 'IsiXhosa',
                'dir' => 'ltr',
                'full' => false,
            ],
            'xh_ZA' => [
                'name' => 'IsiXhosa (EMzantsi Afrika)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'xog' => [
                'name' => 'Olusoga',
                'dir' => 'ltr',
                'full' => false,
            ],
            'xog_UG' => [
                'name' => 'Olusoga (Yuganda)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'yav' => [
                'name' => 'nuasue',
                'dir' => 'ltr',
                'full' => false,
            ],
            'yav_CM' => [
                'name' => 'nuasue (Kemelún)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'yi' => [
                'name' => 'ייִדיש',
                'dir' => 'rtl',
                'full' => false,
            ],
            'yi_UA' => [
                'name' => 'ייִדיש (אוקראַינע)',
                'dir' => 'rtl',
                'full' => true,
            ],
            'yo' => [
                'name' => 'Èdè Yorùbá',
                'dir' => 'ltr',
                'full' => false,
            ],
            'yo_BJ' => [
                'name' => 'Èdè Yorùbá (Orílɛ́ède Bɛ̀nɛ̀)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'yo_NG' => [
                'name' => 'Èdè Yorùbá (Orílẹ́ède Nàìjíríà)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'yue_Hans_CN' => [
                'name' => '粤语 (简体，中华人民共和国)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'yue_Hant_HK' => [
                'name' => '粵語 (繁體，中華人民共和國香港特別行政區)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'za' => [
                'name' => 'Vahcuengh',
                'dir' => 'ltr',
                'full' => false,
            ],
            'za_CN' => [
                'name' => 'Vahcuengh (Cunghgoz)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'zgh_MA' => [
                'name' => 'ⵜⴰⵎⴰⵣⵉⵖⵜ (ⵍⵎⵖⵔⵉⴱ)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'zh' => [
                'name' => '中文',
                'dir' => 'ltr',
                'full' => false,
            ],
            'zh_CN' => [
                'name' => '中文（中国）',
                'dir' => 'ltr',
                'full' => false,
            ],
            'zh_HK' => [
                'name' => '中文（中国香港特别行政区）',
                'dir' => 'ltr',
                'full' => false,
            ],
            'zh_Hans' => [
                'name' => '中文（简体）',
                'dir' => 'ltr',
                'full' => false,
            ],
            'zh_Hans_CN' => [
                'name' => '中文（简体，中国)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'zh_Hans_HK' => [
                'name' => '中文（简体，中国香港特别行政区)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'zh_Hans_MO' => [
                'name' => '中文（简体，中国澳门特别行政区)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'zh_Hans_SG' => [
                'name' => '中文（简体，新加坡)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'zh_Hant' => [
                'name' => '中文（繁體）',
                'dir' => 'ltr',
                'full' => false,
            ],
            'zh_Hant_HK' => [
                'name' => '中文（繁體字，中國香港特別行政區)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'zh_Hant_MO' => [
                'name' => '中文（繁體字，中國澳門特別行政區)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'zh_Hant_TW' => [
                'name' => '中文（繁體，台灣)',
                'dir' => 'ltr',
                'full' => true,
            ],
            'zh_MO' => [
                'name' => '中文（中国澳门特别行政区）',
                'dir' => 'ltr',
                'full' => false,
            ],
            'zh_SG' => [
                'name' => '中文（新加坡）',
                'dir' => 'ltr',
                'full' => false,
            ],
            'zu' => [
                'name' => 'isiZulu',
                'dir' => 'ltr',
                'full' => false,
            ],
            'zu_ZA' => [
                'name' => 'isiZulu (iNingizimu Afrika)',
                'dir' => 'ltr',
                'full' => true,
            ],
        ]);
};
