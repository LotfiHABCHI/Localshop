<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>foire_aux_questions</title>
	<link href="faq.css" rel="stylesheet" type="text/css" />
  <link href="script.css" rel="stylesheet" type="text/css" />
  <script src="{{asset('js/faq.js')}}">
 
 
  </script>

<style>
*, ::before, ::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  font-style: normal;
  background: rgb(255, 248, 248);
}

h1 {
    text-align: center;
    padding: 35px 0;
    font-size: 40px;
    color:rgb(57, 58, 58);
}

.container-faq {
    width: 70%;
    max-width: 900px;
    min-width: 700px;
    height: auto;
    margin: 10px auto 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}
.questions {
    width: 100%;
    height: auto;
    margin: 5px;
}
.visible-pannel {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #f1b05b46;
    border-radius: 10px;
    position: relative;
    z-index: 100;
}
.visible-pannel h2 {
    margin-left: 10px;
    padding: 15px 5px;
    font-size: 25px;
    color: rgb(57, 58, 58);
}
.visible-pannel img {
    margin-right: 10px;
    width: 25px;
    cursor: pointer;
}
.toggle-pannel {
    padding: 0px 15px;
    height: 0px;
    opacity: 0;
}
.toggle-pannel h4 {
    font-size: 18px;
    padding-bottom: 10px;
}
.toggle-pannel p {
    line-height: 1.5;
}




.header{
  display: flex;
  width: 100%;
}

#co{
  padding:2%;
  float: left;
  display: flex;
}

#panier{
  padding:2%;
  float: right;
  display: flex;
}

#logo{
  margin-left: auto;
  margin-right: auto;
  display: flex;
}

hr{
  width:100%;
  color: rgb(57, 58, 58);
}

.core hr{
  width:50%;
  color: rgb(57, 58, 58);
  margin: 0 auto 0 auto;
}

.footer_hr{
  width:100%;
  color: rgb(57, 58, 58);
  margin-top: 3%;
}


.core{
  height: 70%;
}

#core_faq{
  margin-left: auto;
  margin-right: auto;
}

.footer{
  display: flex;
  padding: 2%;
}

#propos, #faq, #mention, #contact, #cci{
  padding-left: 5%;
  display: inline-block;
}

#cci{
  color: rgb(57, 58, 58);
}

a {
  outline: none;
  text-decoration: none;
  padding: 2px 1px 0;
}

.footer a:link {
  color: rgb(108, 115, 116);
}

.footer a:visited {
  color: rgb(108, 115, 116);
}

.footer a:focus {
  border-bottom: 1px solid;
  background: rgb(57, 58, 58);
}

.footer a:hover {
  border-bottom: 1px solid;
  background: rgba(119, 126, 127, 0.452);
}

.footer a:active {
  background: rgb(57, 58, 58);
  color:rgba(119, 126, 127, 0.452);
}

.container-faq hr{
  width: 40%;
  margin: 3% auto 2% auto;
}


#maj{
  margin-top: 3%;
  font-style: italic;
  color: rgb(57, 58, 58);
}



.core a:link {
  color: rgb(255, 123, 0);
}

.core a:visited {
  color: rgb(255, 123, 0);
}

.core a:focus {
  border-bottom: 1px solid;
  background:  rgb(255, 123, 0);
}

.core a:hover {
  border-bottom: 1px solid;
  background: rgb(255, 224, 193);
}

.core a:active {
  background: rgb(255, 123, 0);
  color:rgb(255, 224, 193);
}
</style>
</head>

<body>

	<div class="header">

		<div id="co">
			<a href="/connexion/connexion.html" target="">
				<img class="img_header" src="/img_header/connexion_header.png" alt="connect" height="47" width=""/>
      </a>
    </div>

    <div id="logo">
      <a href="/home/home.html" target="">
        <img class="img_header" src="/img_header/local_header3.png" alt="logo" height="97" width="450"/>
      </a>
    </div>

    <div id="panier">
      <a href="/cart/cart.html" target="">
        <img class="img_header" src="/img_header/panier_header.png" alt="panier" height="38" width="39"/>
      </a>
    </div>

    </div>

    <hr></hr>

    <div class="core">
      <div id="core_faq">

        <h1>Foire aux questions</h1>

        <hr>

        <div class="container-faq">

          <h1>Je suis client/cliente</h1>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Comment fonctionne le click and collect ?</h2>
                <img   src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Comment fonctionne le click and collect ?</h4>
                <p>text</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Quand puis-je récupérer ma commande en click & collect ?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Quand puis-je récupérer ma commande en click & collect ?</h4>
                <p>Vous pouvez récupérer votre commande chez votre producteur/productrice dès la reception du SMS confirmant la disponibilité de votre commande.</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Est-ce que quelqu\'un peut récupérer ma commande Click and Collect à ma place ?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Est-ce que quelqu\'un peut récupérer ma commande Click and Collect à ma place ?</h4>
                <p>Oui, pour récupérer une commande il suffit de se présenter avec votre numéro de commande présent dans le SMS de confirmation de disponibilité de la commande.</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Je ne peux pas récupérer ma commande Click and Collect, puis-je me la faire livrer ?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Je ne peux pas récupérer ma commande Click and Collect, puis-je me la faire livrer ?</h4>
                <p>Actuellement nous ne disposons pas de service de livraison.</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Comment puis-je annuler ma commande Click and Collect ? </h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Comment puis-je annuler ma commande Click and Collect ? </h4>
                <p>Après paiement vous disposez de 30 minutes pour annuler la commande via <a href="">cette page</a>, passé ce delai l\'annulation n\'est plus possible.</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>J\'ai une question concernant un produit, puis-je contacter un/une producteur/productrice ?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>J\'ai une question concernant un produit, puis-je contacter un/une producteur/productrice ?</h4>
                <p>Un numéro de contact est disponible sur chaques pages producteurs/productrices afin de les contacter si vous avez une question sur un produit.</p>
            </div>
          </div> 

          <div class="questions">
            <div class="visible-pannel">
                <h2>Comment puis-je payer sur le site ?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Comment puis-je payer sur le site ?</h4>
                <p>Les moyens de paiement disponibles sont les cartes bancaires (VISA, MASTERCARD, CB) et Paypal.</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Y\'a-t-il un montant minimum de commande ?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Y\'a-t-il un montant minimum de commande ?</h4>
                <p>Il n\'y a pas de montant minimum de commande.</p>
            </div>
          </div> 

          <div class="questions">
            <div class="visible-pannel">
                <h2>Quand est-ce que je serai débité de ma commande ?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Quand est-ce que je serai débité de ma commande ?</h4>
                <p>Le débit se fait à l\'acceptation de la commande par le producteur. De cette façon le producteur pourra préparer la commande dans les meilleures conditions.</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Mon paiement sur LocalShop est-il sécurisé ?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Mon paiement sur LocalShop est-il sécurisé ?</h4>
                <p>Les paiements sur Local Shop sont 100% sécurisés via HTMLKEZDHEROIJ. Vos données ne peuvent pas être détectées, interceptées ou utilisées par des tiers.
 .</p>
            </div>
          </div>  

          <div class="questions">
            <div class="visible-pannel">
                <h2>Comment puis-je évaluer mon achat ?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Comment puis-je évaluer mon achat ?</h4>
                <p>Par soucis de   , pour évaluer un achat chez un/une producteur.productrice, il faut avoir commendé et récupéré 3 commandes.</p>
            </div>
          </div>  

          <div class="questions">
            <div class="visible-pannel">
                <h2>Comment puis-je obtenir la facture de ma commande?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Comment puis-je obtenir la facture de ma commande?</h4>
                <p>Lors du paiement vous pouvez télécharger votre facture au format pdf, si vous ne l\'avez pas fait vous pouvez toujours la retrouver et la télcharger dans l\'onglet <a href="commande">Mes commandes</a>  en cliquant sur "Télécharger ma facture".</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>J\'ai perdu le mot de passe de mon compte, que faire ?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>J\'ai perdu le mot de passe de mon compte, que faire ?</h4>
                <p>Vous pouver réinitialiser votre mot de passe, pour cela rendez-vous sur la page <a href="mdp">Mot de passe oublié</a> afin de suivre la procédure de réinitialisation.</p>
            </div>
          </div>       

          <div class="questions">
            <div class="visible-pannel">
                <h2>Combien de temps ma commande est-elle conservée ?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Combien de temps ma commande est-elle conservée ?</h4>
                <p>Votre commande est conservée durant 48 heures après reception du SMS de confirmation.</p>
            </div>
          </div> 


          <hr>

          <h1>Je suis producteur/productrice</h1>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Je suis producteur/productrice/artisan/artisane et je veux vendre sur LocalShop, comment faire ?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Je suis producteur/productrice/artisan/artisane et je veux vendre sur LocalShop, comment faire ?</h4>
                <p>text</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Personne n\'est venu récupérer la commande, que dois-je faire ?</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Personne n\'est venu récupérer la commande, que dois-je faire ?</h4>
                <p>text</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Q1</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Q1</h4>
                <p>text</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Q1</h2>
                <img  src="{{asset('images/down.svg')}}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Q1</h4>
                <p>text</p>
            </div>
          </div>

        <p id="maj">Dernière mise à jour le 24/02/2021.</p>

        </div>

      </div>
    </div>

    <hr class="footer_hr">

    <div class="footer">
    <div id="propos">
      <a href="/propos/propos.html">
        A PROPOS
      </a>
      </div>

      <div id="faq">
      <a href="/faq/faq.html">
        FAQ
      </a>
      </div>

      <div id="mention">
      <a href="/mention/mention.html">
        MENTIONS LEGALES
      </a>
      </div>

      <div id="contact">
      <a href="/contact/contact.html">
        CONTACT
      </a>
      </div>

      <div id="cci">
          © 2021 CCI | All rights reserved.
      </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.0/gsap.min.js"></script>
	  <script src="faq.js"></script>
  </body>
</html>