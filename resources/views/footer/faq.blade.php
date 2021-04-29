@extends('layouts.base')

@section('title', 'Foire aux questions')

@section('css')
  @parent
  <link href="{{ asset('css/footer/footer.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
      <div id="core_faq">

        <h1>Foire aux questions</h1>

        <hr>

        <div class="container-faq">

          <h1>Je suis client/cliente</h1>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Comment fonctionne le Click & Collect ?</h2>
                <img src="{{ asset('storage/images/down.svg') }}" id="chevronImg" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Comment fonctionne le Click & Collect ?</h4>
                <p>text</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Quand puis-je récupérer ma commande en Click & Collect ?</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Quand puis-je récupérer ma commande en Click & Collect ?</h4>
                <p>Vous pouvez récupérer votre commande chez votre producteur/productrice dès la reception du mail confirmant la disponibilité de votre commande.</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Est-ce que quelqu'un peut récupérer ma commande Click and Collect à ma place ?</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Est-ce que quelqu'un peut récupérer ma commande Click and Collect à ma place ?</h4>
                <p>Oui, pour récupérer une commande il suffit de se présenter avec votre numéro de commande présent dans le SMS de confirmation de disponibilité de la commande.</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Je ne peux pas récupérer ma commande Click and Collect, puis-je me la faire livrer ?</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Je ne peux pas récupérer ma commande Click and Collect, puis-je me la faire livrer ?</h4>
                <p>Actuellement nous ne disposons pas de service de livraison.</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Comment puis-je annuler ma commande Click and Collect ? </h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Comment puis-je annuler ma commande Click and Collect ? </h4>
                <p>Après paiement vous disposez de 30 minutes pour annuler la commande via <a href="">cette page</a>, passé ce delai l'annulation n'est plus possible.</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>J'ai une question concernant un produit, puis-je contacter un/une producteur/productrice ?</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>J'ai une question concernant un produit, puis-je contacter un/une producteur/productrice ?</h4>
                <p>Un numéro de contact est disponible sur chaques pages producteurs/productrices afin de les contacter si vous avez une question sur un produit.</p>
            </div>
          </div> 

          <div class="questions">
            <div class="visible-pannel">
                <h2>Comment puis-je payer sur le site ?</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Comment puis-je payer sur le site ?</h4>
                <p>Les moyens de paiement disponibles sont les cartes bancaires (VISA, MASTERCARD, CB) et Paypal.</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Y'a-t-il un montant minimum de commande ?</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Y'a-t-il un montant minimum de commande ?</h4>
                <p>Il n'y a pas de montant minimum de commande.</p>
            </div>
          </div> 

          <div class="questions">
            <div class="visible-pannel">
                <h2>Quand est-ce que je serai débité de ma commande ?</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Quand est-ce que je serai débité de ma commande ?</h4>
                <p>Le débit se fait à l'acceptation de la commande par le producteur. De cette façon le producteur pourra préparer la commande dans les meilleures conditions.</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Mon paiement sur LocalShop est-il sécurisé ?</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
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
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Comment puis-je évaluer mon achat ?</h4>
                <p>Par soucis de   , pour évaluer un achat chez un/une producteur.productrice, il faut avoir commendé et récupéré 3 commandes.</p>
            </div>
          </div>  

          <div class="questions">
            <div class="visible-pannel">
                <h2>Comment puis-je obtenir la facture de ma commande ?</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Comment puis-je obtenir la facture de ma commande?</h4>
                <p>Lors du paiement vous pouvez télécharger votre facture au format pdf, si vous ne l'avez pas fait vous pouvez toujours la retrouver et la télcharger dans l'onglet <a href="">Mes commandes</a>  en cliquant sur "Télécharger ma facture".</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>J'ai perdu le mot de passe de mon compte, que faire ?</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>J'ai perdu le mot de passe de mon compte, que faire ?</h4>
                <p>Vous pouver réinitialiser votre mot de passe, pour cela rendez-vous sur la page <a href="">Mot de passe oublié</a> afin de suivre la procédure de réinitialisation.</p>
            </div>
          </div>       

          <div class="questions">
            <div class="visible-pannel">
                <h2>Combien de temps ma commande est-elle conservée ?</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
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
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Je suis producteur/productrice/artisan/artisane et je veux vendre sur LocalShop, comment faire ?</h4>
                <p>text</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Personne n'est venu récupérer la commande, que dois-je faire ?</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Personne n'est venu récupérer la commande, que dois-je faire ?</h4>
                <p>text</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Q1</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Q1</h4>
                <p>text</p>
            </div>
          </div>

          <div class="questions">
            <div class="visible-pannel">
                <h2>Q1</h2>
                <img src="{{ asset('storage/images/down.svg') }}" alt="chevron animation">
            </div>
            <div class="toggle-pannel">
                <h4>Q1</h4>
                <p>text</p>
            </div>
          </div>

        <p id="maj">Dernière mise à jour le 24/02/2021.</p>

        </div>

      </div>
@endsection


@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.0/gsap.min.js"></script>
	  <script src="{{ asset('js/footer/faq.js') }}"></script>
@endsection