/* Thai translation for the jQuery Timepicker Addon */
/* Written by Yote Wachirapornpongsa */

function getRegion(){
 $.datepicker.regional['th'] = {clearText: 'Effacer', clearStatus: '',
    closeText: 'Fermer', closeStatus: 'ปิดr',
    prevText: '<', prevStatus: 'เดือนที่แล้ว',
    nextText: 'Suiv>', nextStatus: 'เดือนหน้า',
    currentText: 'Courant', currentStatus: 'เดือนปัจจุบัน',
    monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','Juin',
    'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
    monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun',
    'Jul','Aoû','Sep','Oct','Nov','Déc'],
    monthStatus: 'Voir un autre mois', yearStatus: 'Voir un autre année',
    weekHeader: 'Sm', weekStatus: '',
    dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
    dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
    dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
    dayStatus: 'Utiliser DD comme premier jour de la semaine', dateStatus: 'Choisir le DD, MM d',
    dateFormat: 'dd/mm/yy', firstDay: 0, 
    initStatus: 'Choisir la date', isRTL: false};
 return  $.datepicker.regional['th'];
}