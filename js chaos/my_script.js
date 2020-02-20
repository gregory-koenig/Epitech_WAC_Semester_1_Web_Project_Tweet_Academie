
var pseudo, nom, prenom, date, cpostal, ville, mail, mdp, sexe;
var misssexe, misspseudo, missnom, missMail, missprenom, missville, missdate, missmdp;
var checkPs, checkN, checkPr, checkD, checkC, checkV, checkM, checkMdp, checkS;
formValid = document.getElementById('inscriconfirm');

		var pseudo = document.getElementById("#pseudo");
		var nom = document.getElementById("#nom");
		var prenom = document.getElementById("#prenom");
		var date = document.getElementById("#date");
		var cpostal = document.getElementById("#cpostal");
		var ville = document.getElementById("#ville");
		var mail = document.getElementById("#mail");
		var mdp = document.getElementById("#mdp");

		var misspseudo = document.getElementById("#miss_pseudo");
		var missnom = document.getElementById("#miss_nom");
		var missprenom = document.getElementById("#miss_prenom");
		var missdate = document.getElementById("#miss_date");
		var misscpostal = document.getElementById("#miss_cpostal");
		var missville = document.getElementById("#miss_ville");
		var missmail = document.getElementById("#miss_mail");
		var missmdp = document.getElementById("#miss_mdp");




formValid.addEventListener('click', validation);

function validation(event) {
	//checkG = checkSexe();
	checkN = checkNom();
	checkPr = checkPrenom();
	checkM = checkMail();
	checkC = checkCpostal();
	checkPs = checkPseudo();
	checkD = checkDate();
	checkV = checkVille();
	checkMdp = checkMdp();
 	event.preventDefault();
	if (checkN && checkPr && checkM && checkC && checkPs && checkD && checkV && checkMdp) {
	document.location.href="inscriconfirm.php";
	}
}


function checkNom() {
	if (nom.value == '') {
		nom.style.backgroundColor = 'red';
		missnom.textContent = 'Nom manquant';
		missnom.style.color = 'red';
		return false;
	} else if (nom.value.length < 2) {
		nom.style.backgroundColor = 'orange';
		missnom.textContent = 'Nom incomplet : veuillez préciser au moins deux lettres';
		missnom.style.color = 'orange';
		return false
	} else {
		nom.style.backgroundColor = 'white';
		missnom.textContent = '';
		return true;
	}
}

function checkPrenom() {
	if (prenom.value == '') {
		prenom.style.backgroundColor = 'red';
		missprenom.textContent = 'Prénom manquant';
		missprenom.style.color = 'red';
		return false;
	} else if (prenom.value.length < 2) {
		prenom.style.backgroundColor = 'orange';
		missprenom.textContent = 'Prénom incomplet : veuillez préciser au moins deux lettres';
		missprenom.style.color = 'orange';
		return false;
	} else {
		prenom.style.backgroundColor = 'white';
		missprenom.textContent = '';
		return true;
	}
}

function checkMail() {
	if (mail.value == '') {
		mail.style.backgroundColor = 'red';
		missMail.textContent = 'E-mail manquant';
		missMail.style.color = 'red';
		return false;
	} else {
		mail.style.backgroundColor = 'white';
		missMail.textContent = '';
		return true;
	}
}

function checkCpostal() {
	if (cpostal.value == '') {
		cpostal.style.backgroundColor = 'red';
		misscpostal.textContent = 'Code postal manquant';
		misscpostal.style.color = 'red';
		return false;
	} else {
		cpostal.style.backgroundColor = 'white';
		misscpostal.textContent = '';
		return true;
	}
}

function checkDate() {
	if (date.value == '') {
		date.style.backgroundColor = 'red';
		missdate.textContent = 'Date de naissance manquante';
		missdate.style.color = 'red';
		return false;
	} else {
		date.style.backgroundColor = 'white';
		missdate.textContent = '';
		return true;
	}
}

	function checkVille() {
	if (ville.value == '') {
		ville.style.backgroundColor = 'red';
		missville.textContent = 'Ville manquante';
		missville.style.color = 'red';
		return false;
	} else if (ville.value.length < 2) {
		ville.style.backgroundColor = 'orange';
		missville.textContent = 'Ville incomplete : veuillez préciser au moins deux lettres';
		missville.style.color = 'orange';
		return false
	} else {
		ville.style.backgroundColor = 'white';
		missville.textContent = '';
		return true;
	}
}

function checkPseudo() {
	if (pseudo.value == '') {
		pseudo.style.backgroundColor = 'red';
		misspseudo.textContent = 'Pseudo manquant';
		misspseudo.style.color = 'red';
		return false;
	} else if (pseudo.value.length < 5) {
		pseudo.style.backgroundColor = 'orange';
		misspseudo.textContent = 'Pseudo trop court : veuillez préciser au moins 5 lettres';
		misspseudo.style.color = 'orange';
		return false
	} else {
		pseudo.style.backgroundColor = 'white';
		misspseudo.textContent = '';
		return true;
	}
}

	function checkMdp() {
	if (mdp.value == '') {
		mdp.style.backgroundColor = 'red';
		missmdp.textContent = 'Mot de passe manquant';
		missmdp.style.color = 'red';
		return false;
	} else if (mdp.value.length < 5) {
		mdp.style.backgroundColor = 'orange';
		missmdp.textContent = 'Mot de passe trop court : veuillez préciser au moins deux lettres';
		missmdp.style.color = 'orange';
		return false
	} else {
		mdp.style.backgroundColor = 'white';
		missmdp.textContent = '';
		return true;
	}
}
