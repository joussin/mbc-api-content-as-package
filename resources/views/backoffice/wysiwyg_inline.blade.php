<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>BackofficeController CKEditor 5 - Inline editor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/inline/ckeditor.js"></script>
</head>
<body>

<div id="container">
    <div id="editor">
        <html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="fr" lang="fr" xmlns:fb="http://www.facebook.com/2008/fbml"><head profile="http://dublincore.org/documents/2008/08/04/dc-html/">

            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

            <title>Carte grise - Faire sa démarche en ligne - Habilité par l'Etat</title>

            <meta name="description" content="Faire ses démarches de carte grise en toute simplicité sur Internet. Changement de titulaire ou changement d'adresse. Site agréé par le Ministère de l'Intérieur et le Trésor Public. Guichet carte grise dématérialisé.">
            <meta name="Keywords" content="carte grise, certificat d'immatriculation, CPI, certificat provisoire d'immatriculation, carte grise provisoire, carte grise en ligne, tarif carte grise, SIV, ANTS, FNI, tarif, titulaire, co-titulaire, cheval fiscal, gage, non-gage, immatriculation, taxe, impôt, région, département, préfecture, sous-préfecture, préfecture de police, préfet, mairie, plaque d'immatriculation, plaque minéralogique, immatriculer, voiture, véhicule, circulation, plaques, auto, automobile, Boulogne-Billancourt, Haut-de-Seine,  service-public.fr, formulaires CERFA, documents, papiers du véhicule">

            <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

            <meta http-equiv="Content-Language" content="fr">
            <meta name="language" content="fr">

            <!-- Dublin Core -->
            <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/">
            <link rel="schema.DCTERMS" href="http://purl.org/dc/terms/">
            <meta name="DC.Language" scheme="RFC3066" content="fr">
            <meta name="DC.publisher" content="CarteGriseMinute.fr">
            <meta name="Rating" content="General">

            <!-- Geo meta tags -->
            <meta name="geo.region" content="FR-92">
            <meta name="geo.placename" content="Boulogne-Billancourt">
            <meta name="geo.position" content="48.837429;2.246241">
            <meta name="ICBM" content="48.837429, 2.246241">

            <!-- Facebook open graph protocole -->
            <meta property="fb:app_id" content="223271614371597">
            <meta property="fb:admins" content="100002575483080">
            <meta property="og:title" content="Carte Grise Minute, la carte grise en ligne">
            <meta property="og:type" content="website">
            <meta property="og:url" content="https://www.cartegriseminute.fr">
            <meta property="og:image" content="https://www.cartegriseminute.fr/images/carte-grise-minute.png">
            <meta property="og:site_name" content="CarteGriseMinute.fr">
            <meta property="og:description" content="La carte grise en ligne en 24h">

            <!-- Google Chrome custom -->
            <meta name="application-name" content="CarteGriseMinute.fr">

            <!-- MS meta-data for shortcut on Windows -->
            <!-- http://msdn.microsoft.com/fr-fr/library/gg491732(v=vs.85).aspx -->
            <meta name="msapplication-tooltip" content="Carte Grise Minute, le n°1 de la carte grise en France">
            <meta name="msapplication-starturl" content="./">

            <!-- WebSite pinned in Win8 -->
            <meta name="msapplication-config" content="none">

            <!-- Bootstrap CSS -->
            <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

            <link href="https://www.cartegriseminute.fr/styles/cgm-v4.61.min.css" rel="stylesheet" type="text/css">

            <link rel="icon" type="image/x-icon" href="https://www.cartegriseminute.fr/favicon.ico">

            <!-- Sentry -->
            <!--script
              src="https://browser.sentry-cdn.com/6.19.7/bundle.min.js"
              integrity="sha384-KXjn4K+AYjp1cparCXazrB+5HKdi69IUYz8glD3ySH3fnDgMX3Wg6VTMvXUGr4KB"
              crossorigin="anonymous"
            ></script-->
            <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script async="" src="//static.axept.io/sdk.js"></script><script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-NNP59ZJ"></script><script src="https://browser.sentry-cdn.com/7.2.0/bundle.tracing.min.js" integrity="sha384-aYRZnyYiAq6LYJuiGYtIcU7pA8IJkO863hHMi3e84f5+2aNYtUWgOAHBu/3rBp11" crossorigin="anonymous"></script>
            <script>
                Sentry.init({
                    dsn: "https://3d786a0021d24624abf361fa136ac8c6@o369459.ingest.sentry.io/6371800",
                    // this assumes your build process replaces `process.env.npm_package_version` with a value
                    release: "cgm@1.0",
                    integrations: [new Sentry.BrowserTracing()],

                    // We recommend adjusting this value in production, or using tracesSampler
                    // for finer control
                    tracesSampleRate: 1.0,
                });
            </script>
            <link href="https://www.cartegriseminute.fr/styles/popup_modal.css" rel="stylesheet" type="text/css">

            <!-- Dublin Core document title-->
            <meta name="DC.title" lang="fr" content="Simplifiez-vous la carte grise sur Internet">

            <meta name="subject" content="Carte grise (certificat d'immatriculation) en ligne. Démarches dématérialisées aggréées par l'Etat">

            <meta name="rights" content="https://www.cartegriseminute.fr/cgv.php">
            <meta name="date" content="modified 2018-09-27">
            <meta name="publisher" content="SARL Media Business Conseil">
            <meta name="creator" content="SARL Media Business Conseil">
            <meta name="subject" content="Transports">
            <meta name="contributor" content="Direction de l'information">
            <meta name="coverage" content="France entière">
            <meta name="title" content="Carte grise - Faire sa démarche en ligne - Habilité par l'Etat">

            <meta property="og:type" content="article">
            <meta property="og:title" content="Carte grise - Faire sa démarche en ligne - Habilité par l'Etat">
            <meta property="og:image" content="https://www.cartegriseminute.fr/images/carte-grise-minute.png">
            <meta property="og:url" content="https://www.cartegriseminute.fr">
            <meta property="og:description" content="Solution simple et rapide pour faire ses démarches de carte grise en ligne">

            <meta name="identifier-url" content="https://www.cartegriseminute.fr">
            <link rel="canonical" href="https://www.cartegriseminute.fr">
            <meta name="robots" content="index,follow,all">


            <script type="application/ld+json" data-keepinline=""> {
        "@context": "http://schema.org",
        "@type": "Product",
        "name": "Carte Grise Minute",
        "aggregateRating": {
            "@type": "AggregateRating",
            "worstRating": 1,
            "bestRating": 5,
            "ratingCount": 77,
            "ratingValue": 4.1        }
    }
    </script>


            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-NNP59ZJ');</script>
            <!-- End Google Tag Manager -->


            <meta name="google-site-verification" content="udCNOFGTGM9hDJJAGgaD-DNbJ6w7thuxMQ7HTMPd078">

            <!-- Including jQuery -->
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

            <!-- Bootstrap compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


            <!--
                    CRITEO
            -->

            <!--script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script-->




            <!--
                ADEQUA
            -->
            <script type="text/javascript" async="" src="https://client.adequa.me/cartegriseminute/adequa.js"></script>



            <!--
                    Facebook pixel
            -->


            <link href="https://www.cartegriseminute.fr/styles/index.css" rel="stylesheet">

            <link rel="stylesheet" href="https://www.cartegriseminute.fr/styles/faq.css">
            <script>
                window.onload = function () {
                    var questionsFaq = document.querySelectorAll('.question-wrapper').forEach(
                        function (question) {
                            question.addEventListener('click', function (event) {
                                var qrWrapper = question.closest('.qr-wrapper');
                                var reponse = qrWrapper.querySelector('.reponse-wrapper');
                                var iconDown = qrWrapper.querySelector('.arrow-down-wrapper');
                                var iconRight = qrWrapper.querySelector('.arrow-right-wrapper');
                                if (!reponse || !iconDown || !iconRight) {
                                    console.log('erreur')
                                    return;
                                }
                                reponse.classList.toggle('d-none');
                                iconDown.classList.toggle('d-none');
                                iconRight.classList.toggle('d-none');
                            });
                        }
                    );
                }
            </script>

            <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
    {
            "@type": "Question",
            "name": "Quel est le délai pour recevoir la nouvelle carte grise ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "A réception d'un dossier complet, le dossier sera vérifié et transmis à l'imprimerie nationale pour fabrication sous un délai de 24 à 48h dès réception. Ainsi, la carte grise sera expediée à l'usager sous maximum 7 jours.<br/><br/>"
            }
        },{
            "@type": "Question",
            "name": "Faut-il impérativement un code de cession pour faire sa demande ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Le code de cession est généré si la vente a été enregistrée sur le site <a href=\"/ANTS-carte-grise.php\">ANTS</a> (Agence Nationale des Titres Sécurisés). L'ancien propriétaire va fournir un code à cinq chiffres à son acheteur afin que celui-ci puisse immatriculer le véhicule à son nom. Le vendeur doit enregistrer la cession sous 15 jours et aura le code de cession valide pendant 15 jours.<br/>Si l'acheteur n'immatricule pas son véhicule sous deux semaines après l'obtention du code ou si l'acheteur n'a pas de code de cession du fait qu'il a enregistré la vente auprès d'un professionnel habilité par le Ministère de l'Intérieur, il sera possible de faire sa demande d'immatriculation sur le site cartegriseminute.fr. Le code de cession n'est pas nécessaire si l'acquéreur fait appel à un professionnel habilité et agréé. "
            }
        },{
            "@type": "Question",
            "name": "Le Certificat Provisoire d'Immatriculation peut-il remplacé la carte grise ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Le CPI ou certificat provisoire d'immatriculation est délivré à l'usager avant qu'il reçoit sa carte grise définitive par la poste. Le CPI autorise, pendant un délai d'un mois, la circulation du véhicule en France. L'usager devra poser ses nouvelles plaques s'il y a eu un changement du numéro d'immatriculation.<br/>Ce document est récupéré sur le SIV par le professionnel habilité ou sur le site ANTS et se présente sous forme d'imprimé sur papier classique. "
            }
        },{
            "@type": "Question",
            "name": "Que faut-il faire pour changer une voiture de société en VP ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Suite à une modification du nombre de places, par exemple un véhicule de société de 2 places à transformer en VP de 5 places, il faut impérativement mettre à jour la carte grise. Si la pose de la banquette et des ceintures de sécurité ont été faits par un professionnel, ce dernier délivrera une conformité de transformation nécessaire pour changer le genre du véhicule de <a href=\"/carte-grise-camionnette.php\">CTTE</a> en VP. Dans le cas contraire, le véhicule doit passer au DREAL pour une réception à titre isolé (RTI) ou faire validé la modification par le constructeur."
            }
        },{
            "@type": "Question",
            "name": "Pour quelle raison faut-il fournir un cerfa de demande de certificat d'immatriculation ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Pour toute démarche de carte grise, afin de permettre la modification concernant les informations du véhicule et de son propriétaire, le document \"Demande de Certificat d'Immatriculation\" ou CERFA 13750 est requis.<br/>Il permet de savoir précisément le type de démarche voulue par le demandeur."
            }
        },{
            "@type": "Question",
            "name": "Est-il possible de demander un changement de nom et d'adresse en même temps ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Dans le cas où l'on a fait l'acquisition d'un véhicule et qu'entre temps, le domicile à changer, deux démarches s'imposent: la demande de changement de titulaire puisqu'on dispose d'un délai d'un mois après l'acquisition pour refaire la carte grise à son nom et le changement de domicile pour déclarer la nouvelle adresse. Ces deux démarches peuvent se faire en même temps à condition de transmettre un document intitulé \"Demande de Certificat d'Immatriculation\", sur lequel doivent êtres cochés les cases suivantes: \"CERTIFICAT\" et \"CHANGEMENT DE DOMICILE\"."
            }
        },{
            "@type": "Question",
            "name": "Pour un véhicule importé neuf, est-t-il obligatoire de fournir un quitus fiscal?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Le quitus fiscal est obligatoire pour les particuliers ou les professionnels.<br/>Les véhicules considérés comme neufs sont exonérés de la taxe fiscale.<br/>Les critères permettant d'indiquer qu'un véhicule est neuf se jugent par le kilométrage du véhicule et sa date de première mise en circulation. Ceux-ci correspondent à une première mise en circulation de moins de 6 mois, avec au compteur kilométrique de moins de 6000km.<br/>"
            }
        },{
            "@type": "Question",
            "name": "Est-t-il possible de demander une carte grise avec une personne physique comme « titulaire principal » et une personne morale en tant que « Co titulaire »?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Oui, c'est possible de demander une carte grise avec une personne physique comme « titulaire principale » et une personne morale en tant que « Co titulaire » et l'inverse également.<br/>Il faut que l'acquéreur et le Co acquéreur soient bien notés sur la déclaration de cession.<br/>Il est aussi possible qu'une personne physique désigne sa société comme « titulaire principal » et lui en « Co titulaire » s'il n'a pas le permis de conduire alors qu'il est le seul sur la déclaration de cession comme nouveau titulaire, pour traiter une démarche de changement de titulaire.<br/>"
            }
        },{
            "@type": "Question",
            "name": "Un véhicule sans permis doit-t-il repasser le contrôle technique pour un changement de titulaire ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Les véhicules standards doivent passer au contrôle technique tous les deux ans.<br/>Pour le cas des véhicules sans permis, ces derniers étant considérés comme des véhicules spéciaux, il n'est pas obligatoire pour ces derniers de passer au contrôle technique, pour un changement de titulaire ; tout comme les motos, quad ou scooter.<br/>"
            }
        },{
            "@type": "Question",
            "name": "Pourquoi joindre la demande de certificat d'immatriculation si celle-ci reste inchanger?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "A titre d'information, pour toute démarche de carte grise la demande de certificat d'immatriculation est obligatoire même si le véhicule en question ne change pas de numéro, ce document comporte les informations du véhicule et le titulaire."
            }
        },{
            "@type": "Question",
            "name": "Est-il possible de mettre plusieurs co-titulaires sur une CG?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Effectivement c'est possible d'ajouter des co-titulaires sur la carte grise mais il ne faut surtout pas oublier de mettre leur nom sur la déclaration de cession ainsi que la signature et également sur la demande de certificat d'immatriculation, en outre, il faut joindre aussi la copie recto verso de leur pièce d'identité valide."
            }
        },{
            "@type": "Question",
            "name": "Est-il possible de déposer les documents à main propre ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Effectivement, vous avez la possibilité de déposer les documents à l'agence directement. L'adresse est la suivante CarteGriseMinute.fr 12-14, rue Lazare HocheCS 60058/ 92774 Boulogne-Billancourt.<br/>92774 BOULOGNE-BILLANCOURT CEDEX"
            }
        },{
            "@type": "Question",
            "name": "Quels sont les documents à envoyer pour immatriculer un véhicule neuf?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Pour immatriculer un véhicule neuf, vous devriez préparer les éléments suivants :<br/>-La facture d'achat originale<br/>-Le certificat de conformité originale<br/>-La demande de certificat d'immatriculation originale<br/>-La <a href=\"/mandat-immatriculation.php\">procuration par mandat</a> originale<br/>-La copie recto verso de la pièce d'identité valide<br/>-La copie recto verso du permis de conduire<br/>-La copie d'attestation d'assurance ou la carte verte en cours de validité<br/>-Le <a href=\"/justificatifs-domicile.php\">justificatif de domicile</a> moins de 6 mois."
            }
        }
    ]}
    </script>
            <style data-styled="active" data-styled-version="5.3.1"></style></head>

        <body itemscope="" itemtype="http://schema.org/WebPage">

        <div class="supertop">



            <div class="top">
                <div id="entete">

                    <div id="header_fc" style="position: relative; float: right; margin-right: 20px;" class="hidden-xs">
                        <a href="/thirdparty/franceconnect/authentication.php">
                            <img id="img_franceconnect" class="img_responsive" src="/images/franceconnect/bouton_fond_bleu.jpg" onmouseover="this.src='/images/franceconnect/bouton_fond_blanc.jpg'" onmouseout="this.src='/images/franceconnect/bouton_fond_bleu.jpg'" alt="Connectez-vous simplement avec FranceConnect" width="224" height="56">
                        </a>
                        <a href="https://franceconnect.gouv.fr/" target="_blank" rel="nofollow noopener" style="text-decoration:underline; display: block; margin-top: 8px;">Qu'est-ce que FranceConnect ?</a>
                    </div>


                    <!--img src="/images/commun/pictogrammes/agrement_habilitation.png" id="logo_agrement" alt="Plateforme en ligne agréée et habilitée par le ministère de l'intérieur et le trésor public"/-->

                    <div id="logo_header_cgm" class="hidden-xs">
                        <img src="https://www.cartegriseminute.fr/images/carte-grise-minute.png" class="img-responsive" border="0" alt="carte grise" width="400px" height="83px">

                    </div>
                </div>
            </div>
        </div>

        <div class="supertop" style="background-color: #f3f3f3;">
            <div class="top">
                <div class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" style="padding-bottom:2px; padding-top:5px" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Menu</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span style="font-size:9px">Menu</span>
                            </button>
                            <a class="navbar-brand hidden-sm hidden-md hidden-lg hidden-xl logo_header" href="https://www.cartegriseminute.fr/" title="Carte Grise Minute">
                                <img src="https://www.cartegriseminute.fr/images/carte-grise-minute.png" class="img-responsive" style="max-width:210px; padding-top:6px" border="0" alt="CarteGriseMinute, n°1 de la carte grise en ligne" width="210px" height="44px">
                            </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="/carte-grise-prix.php" title="Calculer le prix de votre demarche carte grise">Prix carte grise</a></li>
                                <li><a href="/tarif-carte-grise-region.php" title="Le tarif dans votre département">Tarifs Départements</a></li>
                                <li><a href="/carte-grise-en-ligne.php" title="Les diffférentes demandes de carte grise en ligne">Carte grise en ligne</a></li>
                                <li><a href="/vos-demarches-changement-de-titulaire-carte-grise.php" title="Changement de propriétaire">Changement de propriétaire</a></li>
                                <li><a href="/declaration-cession.php" title="Déclarer en ligne la cession d'un véhicule">Certificat de cession</a></li>
                                <li><a href="/vos-demarches-changement-d-adresse-carte-grise.php" title="Faire un changement d'adresse sur votre carte grise">Changement d'adresse</a></li>
                                <!--li><a href="/marques/" title="Marques et modèles">Marques / Modèles</a></li-->
                                <!--li><a href="/formulaires-officiels-cerfa.php" title="Formulaires CERFA pour votre Carte Grise">Formulaires</a></li-->
                                <!--li><a href="/contacter-carte-grise-minute.php" title="Contacter Carte Grise Minute">Contact</a></li-->
                                <!--li><a href="/qui-sommes-nous.php" title="Qui sommes nous?">Qui sommes nous?</a></li-->
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <!--li><a href="/compte.php">Suivi dossier</a></li-->
                                <li><a href="https://www.cartegriseminute.fr/compte.php">Espace Client</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>





        <div id="offre">
            <div class="top_home" style="background: none; margin-top:0">
                <div class="col-md-3 hidden-xs hidden-sm">
                    <img src="images/commun/personne/faire_sa_carte_grise.jpg" class="img-responsive" style="max-width:200px; margin:0 auto" alt="faire sa carte grise">
                </div>
                <div class="col-md-6 col-sm-10 col-xs-5">
                    <h1 itemprop="name" class="top_home_h1" style="font-size:32px; text-transform:uppercase;margin-bottom:0;">Carte grise</h1>
                    <div class="sous_titre_slider">Ma demande de carte grise validée en 5 min</div>
                    <div class="sous_titre_agrement" style="font-size:14px; font-style:italic">à partir de 29,90 € / Agréé et habilité Ministère de l'Intérieur</div>
                </div>
                <div class="col-md-3 col-sm-2 hidden-xs hidden-sm" style="text-align: center;">
                    <a href="/carte-grise-paiement-plusieurs-fois.php">
                        <div style="font-size: 16px; color: rgb(25, 85, 158); font-weight: 700; margin-top: 20px;">Grâce à <img src="/images/commun/logos-mode-paiement/FLOA4X_CLASSIQUE_133x23.png" class="lien_cb_differe" alt="cb 4x"></div>
                        <div style="font-size: 18px; color: rgb(25, 85, 158); font-weight: 700; margin-top: 5px;">Payez en plusieurs fois !</div>
                        <img src="/images/certificat-immatriculation.png" alt="Certificat Immatriculation" width="35%"></a>
                </div>
                <div class="col-xs-7 visible-xs">
                    <div id="home_fc" style="position: relative; float: right; width: 100%; margin-top: 20px;">
                        <a href="/thirdparty/franceconnect/authentication.php?home=">
                            <img id="img_franceconnect" class="img_responsive" src="/images/franceconnect/bouton_fond_bleu.jpg" onmouseover="this.src='/images/franceconnect/bouton_fond_blanc.jpg'" onmouseout="this.src='/images/franceconnect/bouton_fond_bleu.jpg'" alt="Connectez-vous simplement avec FranceConnect" style="max-width: 224px;width: 100%;min-width: 155px;">
                        </a>
                        <a href="https://franceconnect.gouv.fr/" target="_blank" rel="nofollow noopener" style="text-decoration:underline; display: block; margin-top: 8px; font-size: 13px;">Qu'est-ce que FranceConnect ?</a>
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>
        </div>


        <div id="siteWrapper" style="clear: both;">
            <div class="col-xs-12 visible-xs" style="margin-top: 30px;"> </div>
            <div id="calculateur_header" style="clear: both;">

                <div class="row content_siteWrapper">
                    <form class="form-inline" action="https://www.cartegriseminute.fr/carte-grise-prix.php" method="get" id="calcul_inline">
                        <input type="hidden" name="from" value="miniform">
                        <div class="form-group form-group-hidden-xs col-xs-12 col-sm-4 col-md-3 col-lg-3" style="text-align:center">
                            <label for="demarche" style="color:white; text-transform: uppercase; font-size: 12px;">Sélectionnez votre démarche</label><br>
                            <select name="demarche" id="demarche" class="form-control" style="width:100%; height:50px" onchange="callback_demarche_calculateur();">
                                <option value="1" selected="">Immatriculation véhicule d'occasion</option>
                                <option value="-1">Immatriculation véhicule neuf</option>
                                <option value="">---------------------</option>
                                <option value="2">Changement de domicile</option>
                                <option value="4">Demande de duplicata</option>
                                <option value="3">Changement de statut matrimonial</option>
                                <option value="">---------------------</option>
                                <option value="10">Immatriculation provisoire WW</option>
                                <option value="">---------------------</option>
                                <option value="9">Déclaration de cession d'un véhicule</option>
                            </select>
                        </div>
                        <div id="div_immatriculation_calculateur" class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3" style="text-align:center">
                            <label for="immatriculation" style="color:white; text-transform: uppercase; font-size: 12px;">Immatriculation</label>
                            <br>
                            <div style="background-image:url(https://www.cartegriseminute.fr/images/commun/immatriculation_carte_grise.png); width:250px; height:50px; margin: 0 auto;">
                                <input type="text" class="form-control" name="immatriculation" id="immatriculation" onclick="afficherCalculateur()" style="width:100%; background: transparent; border: none; text-align: center;height: 100%; font-size: 30px; text-transform:uppercase;" placeholder="AA-123-AA">
                            </div>
                            <span class="gtm-imat-inconnue" style="text-decoration:underline;color:#f3f3f3;font-size:11px;cursor:pointer;display:block;margin-top:8px;" onclick="callback_immat_inconnue();">Je ne connais pas l'immatriculation</span>
                        </div>
                        <div class="form-group form-group-hidden-xs col-xs-12 col-sm-2 col-md-2 col-lg-2" style="text-align:center">
                            <label for="departement" style="color:white; text-transform: uppercase; font-size: 12px;">Département</label><br>
                            <select name="departement" id="departement" class="form-control" style="width:100%; height:50px">
                                <!-- via API --><option value="01">01 - Ain</option><option value="02">02 - Aisne</option><option value="03">03 - Allier</option><option value="04">04 - Alpes-de-Haute-Provence</option><option value="05">05 - Hautes-Alpes</option><option value="06">06 - Alpes-Maritimes</option><option value="07">07 - Ardèche</option><option value="08">08 - Ardennes</option><option value="09">09 - Ariège</option><option value="10">10 - Aube</option><option value="11">11 - Aude</option><option value="12">12 - Aveyron</option><option value="13">13 - Bouches-du-Rhône</option><option value="14">14 - Calvados</option><option value="15">15 - Cantal</option><option value="16">16 - Charente</option><option value="17">17 - Charente-Maritime</option><option value="18">18 - Cher</option><option value="19">19 - Corrèze</option><option value="2A">2A - Corse-du-Sud</option><option value="2B">2B - Haute-Corse</option><option value="21">21 - Côte-d'Or</option><option value="22">22 - Côtes-d'Armor</option><option value="23">23 - Creuse</option><option value="24">24 - Dordogne</option><option value="25">25 - Doubs</option><option value="26">26 - Drôme</option><option value="27">27 - Eure</option><option value="28">28 - Eure-et-Loir</option><option value="29">29 - Finistère</option><option value="30">30 - Gard</option><option value="31">31 - Haute-Garonne</option><option value="32">32 - Gers</option><option value="33">33 - Gironde</option><option value="34">34 - Hérault</option><option value="35">35 - Ille-et-Vilaine</option><option value="36">36 - Indre</option><option value="37">37 - Indre-et-Loire</option><option value="38">38 - Isère</option><option value="39">39 - Jura</option><option value="40">40 - Landes</option><option value="41">41 - Loir-et-Cher</option><option value="42">42 - Loire</option><option value="43">43 - Haute-Loire</option><option value="44">44 - Loire-Atlantique</option><option value="45">45 - Loiret</option><option value="46">46 - Lot</option><option value="47">47 - Lot-et-Garonne</option><option value="48">48 - Lozère</option><option value="49">49 - Maine-et-Loire</option><option value="50">50 - Manche</option><option value="51">51 - Marne</option><option value="52">52 - Haute-Marne</option><option value="53">53 - Mayenne</option><option value="54">54 - Meurthe-et-Moselle</option><option value="55">55 - Meuse</option><option value="56">56 - Morbihan</option><option value="57">57 - Moselle</option><option value="58">58 - Nièvre</option><option value="59">59 - Nord</option><option value="60">60 - Oise</option><option value="61">61 - Orne</option><option value="62">62 - Pas-de-Calais</option><option value="63">63 - Puy-de-Dôme</option><option value="64">64 - Pyrénées-Atlantiques</option><option value="65">65 - Hautes-Pyrénées</option><option value="66">66 - Pyrénées-Orientales</option><option value="67">67 - Bas-Rhin</option><option value="68">68 - Haut-Rhin</option><option value="69">69 - Rhône</option><option value="70">70 - Haute-Saône</option><option value="71">71 - Saône-et-Loire</option><option value="72">72 - Sarthe</option><option value="73">73 - Savoie</option><option value="74">74 - Haute-Savoie</option><option value="75">75 - Paris</option><option value="76">76 - Seine-Maritime</option><option value="77">77 - Seine-et-Marne</option><option value="78">78 - Yvelines</option><option value="79">79 - Deux-Sèvres</option><option value="80">80 - Somme</option><option value="81">81 - Tarn</option><option value="82">82 - Tarn-et-Garonne</option><option value="83">83 - Var</option><option value="84">84 - Vaucluse</option><option value="85">85 - Vendée</option><option value="86">86 - Vienne</option><option value="87">87 - Haute-Vienne</option><option value="88">88 - Vosges</option><option value="89">89 - Yonne</option><option value="90">90 - Territoire de Belfort</option><option value="91">91 - Essonne</option><option value="92">92 - Hauts-de-Seine</option><option value="93">93 - Seine-Saint-Denis</option><option value="94">94 - Val-de-Marne</option><option value="95">95 - Val-d'Oise</option><option value="971">971 - Guadeloupe</option><option value="972">972 - Martinique</option><option value="973">973 - Guyane</option><option value="974">974 - La Réunion</option><option value="976">976 - Mayotte</option>			</select>
                        </div>
                        <div id="div_calculer" class="form-group col-xs-12 col-sm-2 col-md-3 col-lg-2">
                            <button type="submit" id="bouton_calculateur_inline" class="btn btn-default bouton_calculer_design" style="position: relative; top:22px;">Calculer<span class="hidden-sm"> le tarif</span></button>
                        </div>
                        <div class="form-group col-lg-2 hidden-md hidden-sm hidden-xs">
                            <!--img src="https://www.cartegriseminute.fr/images/certificat-immatriculation.png" alt="Certificat Immatriculation" width="100%" style="margin-top:25px" /-->
                        </div>
                    </form>
                </div>
                <div style="clear:both"></div>


                <script type="text/javascript">
                    if( typeof(storageAvailable) == undefined ){
                        //OK
                    } else {
                        function storageAvailable() {
                            try {
                                var storage = window['localStorage'],
                                    x = '__storage_test__';
                                storage.setItem(x, x);
                                storage.removeItem(x);
                                return true;
                            }
                            catch(e) {
                                return e instanceof DOMException && (
                                        // everything except Firefox
                                        e.code === 22 ||
                                        // Firefox
                                        e.code === 1014 ||
                                        // test name field too, because code might not be present
                                        // everything except Firefox
                                        e.name === 'QuotaExceededError' ||
                                        // Firefox
                                        e.name === 'NS_ERROR_DOM_QUOTA_REACHED'
                                    ) &&
                                    // acknowledge QuotaExceededError only if there's something already stored
                                    storage && storage.length !== 0;
                            }
                        }
                    }

                    if (storageAvailable()) {
                        if(localStorage.getItem('departement')){
                            $('#departement option[value='+localStorage.getItem('departement')+']').prop('selected', true);
                        }
                        else if(localStorage.getItem('code_postal')){
                            let code_postal = localStorage.getItem('code_postal');
                            let dept = code_postal.substring(0, 2);
                            if (dept == '97') {
                                //DOM
                                dept = code_postal.substring(0, 3);
                            } else if(dept == '20') {
                                dept = '2A';
                            }
                            $('#departement option[value='+dept+']').prop('selected', true);
                        }

                        if(localStorage.getItem('immatriculation')){
                            $('#immatriculation').val(localStorage.getItem('immatriculation'));
                        }
                    }

                    function callback_immat_inconnue(){
                        document.location.href="https://www.cartegriseminute.fr/carte-grise-prix.php?immat_inconnue=1";
                    }

                    function callback_demarche_calculateur(){
                        var demarche = $('form#calcul_inline select[name=demarche]').val();
                        $('#div_immatriculation_calculateur').show();
                        if(demarche == -1 || demarche == 10) {
                            $('#div_immatriculation_calculateur').hide();
                        }
                    }



                    function doRequestNGCVIN(inputs) {
                        window.dataLayer = window.dataLayer || [];

                        if($('#div_immatriculation_calculateur').is(':visible')) {
                            // check de l'immatriculation à tester
                            var immat = $("form#calcul_inline input[name=immatriculation]").val();
                            immat = immat.toUpperCase();
                            /*if(immat.substr(0, 2) == 'WW') {
                                // Import VO... choisir la bonne démarche
                                $('form#calcul_inline #demarche option[value=10]').prop('selected', true);
                                $('form#calcul_inline').submit();
                                return;
                            }*/
                        } else {
                            callback_immat_inconnue();
                            return;
                        }

                        $.ajax({
                            dataType:'jsonp',
                            url: "/js/jQuery/getDonneesImmatriculation.php",
                            data: { immatriculation:immat },
                            success:function(response) {

                                if(response.erreur != '') {
                                    callback_immat_inconnue();
                                    return;
                                }
                                else if(response.collection == 'oui') {
                                    // Il faut cocher oui/non c'est un véhicule collection
                                    // charger le formulaire
                                    $('form#calcul_inline').submit();
                                    return;
                                }


                                //
                                // On a les données correspondant à ce numéro d'immatriculation
                                //


                                // On construit la chaîne
                                //var formFields = $('form#calcul :input').serialize();
                                formFields  = ('immatriculation='+response.immat);
                                formFields += ('&demarche='+$('form#calcul_inline select[name=demarche]').val());
                                formFields += ('&departement='+$('form#calcul_inline select[name=departement]').val());
                                formFields += ('&chevaux_fiscaux='+response.puisFisc);
                                formFields += ('&date_immatriculation='+response.date1erCir_fr);
                                formFields += ('&co2='+response.co2);
                                formFields += ('&energie='+response.energie);
                                formFields += ('&type_vehicule='+response.genreVCG);
                                formFields += ('&j3_marchandise='+response.carrosserieCG);
                                formFields += ('&marque='+response.marque);
                                formFields += ('&modele='+response.modele);
                                if($('form#calcul_inline select[name=demarche]').val() == -1) {
                                    formFields += ('&neuf_occasion=1');
                                } else {
                                    formFields += ('&neuf_occasion=2');
                                }

                                // sécurisation form API cg.org
                                formFields += ('&apikey=85352d0f24d99652485d710a3075bd9e');
                                formFields += ('&securID_3=cf89a50c9d0a05d227d7332422430d99-46028');


                                // On va calculer le tarif
                                $.ajax({
                                    dataType:'jsonp',
                                    url: 'https://www.cartegriseminute.fr/js/jQuery/getTarifCalculateur.php',
                                    data: { param:formFields },
                                    success:function(response) {

                                        // L'objet response contient les données 'erreur', 'message', 'tarif', 'id', et 'y1' à 'y5'.
                                        // Si 'erreur' est renseigné, contient le message d'erreur ayant bloqué le calcul du tarif ,
                                        // 'message' contient eventuellement un message d'avertissement sur le calcul du tarif,
                                        // 'tarif' contient le prix total de la carte grise,
                                        // 'id' contient l'identifiat unique du tarif historisé chez Carte-Grise.org
                                        // 'y1' à 'y5' contiennent le tarif décomposé (taxe régionale, taxe parafiscale, surtaxe co2, frais de dossier, frais postaux)

                                        if(response.erreur != ""){
                                            // KO
                                            $('form#calcul_inline').submit();
                                        }
                                        else {
                                            // OK

                                            //
                                            //historiser dans le localStorage les données
                                            if (storageAvailable()) {
                                                localStorage.setItem('immatriculation', immat);
                                                localStorage.setItem('departement', $('form#calcul_inline select[name=departement]').val());
                                            }
                                            //
                                            //

                                            var warning = response.message;


                                            // Stat nb de calcul / démarche
                                            if(Math.abs(demarche) == 1){
                                                window.dataLayer.push({
                                                    'event': 'demarcheAjax',
                                                    'demarche': 'Changement de titulaire'
                                                });
                                            } else {
                                                if(demarche == DEMANDE_DUPLICATA){
                                                    window.dataLayer.push({
                                                        'event': 'demarcheAjax',
                                                        'demarche': 'Duplicata'
                                                    });
                                                } else {
                                                    if(demarche == DEMANDE_CHANGEMENT_DOMICILE){
                                                        window.dataLayer.push({
                                                            'event': 'demarcheAjax',
                                                            'demarche': 'Changement de domicile'
                                                        });
                                                    } else {
                                                        // autres
                                                        window.dataLayer.push({
                                                            'event': 'demarcheAjax',
                                                            'demarche': 'Autres'
                                                        });
                                                    }
                                                }
                                            }


                                            // URL redirection
                                            var referer = '';
                                            var formAction = 'https://www.cartegriseminute.fr/resultat-tarif-v2.php';
                                            demarche = $('form#calcul_inline select[name=demarche]').val();
                                            if(demarche == 2 || demarche == 4){
                                                // cobranding sur SCG
                                                formAction = 'https://www.service-cartegrise.fr/resultat-tarif-v2.php';
                                                referer = 'cgm';
                                            }
                                            else if(demarche == 9){
                                                // cobranding sur dcv
                                                formAction = 'https://www.declaration-cession-vehicule.fr/enregistrement-cession.php';
                                                referer = 'cgm';
                                            }


                                            // Création du formulaire caché
                                            var form = document.createElement("form");

                                            form.setAttribute("action", formAction);
                                            form.setAttribute("method", "post");
                                            //form.setAttribute("target", "_blank");
                                            form.setAttribute("style", "visibility:hidden");
                                            form.setAttribute("name", "resultat");
                                            form.setAttribute("id", "resultat");
                                            document.body.appendChild(form);

                                            if(demarche != 9){
                                                // carte grise

                                                var input = document.createElement("input");
                                                input.setAttribute("type", "text");
                                                input.setAttribute("name", "warning");
                                                input.setAttribute("value", warning);
                                                form.appendChild(input);

                                                var input = document.createElement("input");
                                                input.setAttribute("type", "text");
                                                input.setAttribute("name", "total");
                                                input.setAttribute("value", response.tarif);
                                                form.appendChild(input);

                                                var input = document.createElement("input");
                                                input.setAttribute("type", "text");
                                                input.setAttribute("name", "y1");
                                                input.setAttribute("value", response.y1);
                                                form.appendChild(input);

                                                var input = document.createElement("input");
                                                input.setAttribute("type", "text");
                                                input.setAttribute("name", "y2");
                                                input.setAttribute("value", response.y2);
                                                form.appendChild(input);

                                                var input = document.createElement("input");
                                                input.setAttribute("type", "text");
                                                input.setAttribute("name", "y3");
                                                input.setAttribute("value", response.y3);
                                                form.appendChild(input);

                                                var input = document.createElement("input");
                                                input.setAttribute("type", "text");
                                                input.setAttribute("name", "y4");
                                                input.setAttribute("value", response.y4);
                                                form.appendChild(input);

                                                var input = document.createElement("input");
                                                input.setAttribute("type", "text");
                                                input.setAttribute("name", "y5");
                                                input.setAttribute("value", response.y5);
                                                form.appendChild(input);

                                                var input = document.createElement("input");
                                                input.setAttribute("type", "text");
                                                input.setAttribute("name", "id");
                                                input.setAttribute("value", response.id);
                                                form.appendChild(input);

                                                if(referer != '') {
                                                    var input = document.createElement("input");
                                                    input.setAttribute("type", "text");
                                                    input.setAttribute("name", "referer");
                                                    input.setAttribute("value", referer);
                                                    form.appendChild(input);
                                                }

                                                var input = document.createElement("input");
                                                input.setAttribute("type", "text");
                                                if(demarche == 2 || demarche == 4){
                                                    input.setAttribute("name", "cg_data_scg");
                                                } else {
                                                    input.setAttribute("name", "cg_data_cgm");
                                                }
                                                input.setAttribute("value", formFields);
                                                form.appendChild(input);
                                            }
                                            else {
                                                // Déclaration de cession

                                                var input = document.createElement("input");
                                                input.setAttribute("type", "text");
                                                input.setAttribute("name", "immatriculation_declaration_cession");
                                                input.setAttribute("value", immat);
                                                form.appendChild(input);

                                                var input = document.createElement("input");
                                                input.setAttribute("type", "text");
                                                input.setAttribute("name", "marque");
                                                input.setAttribute("value", response.marque);
                                                form.appendChild(input);

                                                var input = document.createElement("input");
                                                input.setAttribute("type", "text");
                                                input.setAttribute("name", "modele");
                                                input.setAttribute("value", response.modele);
                                                form.appendChild(input);
                                            }

                                            form.submit();
                                        }
                                    },
                                    error:function (xhr, ajaxOptions, thrownError) {
                                        $('form#calcul_inline').submit();
                                        return;
                                    }
                                });
                            },
                            error:function (xhr, ajaxOptions, thrownError) {
                                $('form#calcul_inline').submit();
                                return;
                            }
                        });
                    }


                    $(function() {
                        $("#bouton_calculateur_inline").click(function(event) {
                            event.preventDefault();
                            $('#div_calculer').html('<img src="/images/loadingAnimation.gif" />');

                            demarche = $('form#calcul_inline select[name=demarche]').val();
                            if(demarche == -1 || demarche == 10) {
                                // neuf ou import donc on a pas l'immat, on valide le form
                                $('form#calcul_inline').submit();
                            }

                            formFields = $("form#calcul_inline").serialize();
                            /*formFields  = ('immatriculation='+$('form#calcul_inline input[name=immatriculation]').val());
                            //formFields += ('&demarche='+$('form#calcul_inline select[name=demarche]').val());
                            formFields += ('&departement='+$('form#calcul_inline select[name=departement]').val());*/

                            doRequestNGCVIN(formFields);

                            return false;
                        });
                    });
                </script>







                <script>
                    var header = document.querySelector("#siteWrapper header");
                    var width_ecran = (window.innerWidth);

                    function scrolled(){
                        var currentScroll = document.body.scrollTop || document.documentElement.scrollTop;

                        if(width_ecran > 767){
                            document.getElementById("calculateur_header").className = (currentScroll >= 310) ? "fixed" : "";

                            if(currentScroll >= 310){
                                $("#calculateur_header").css("background-color", "#f99200");
                                $("#bouton_calculateur_inline").css("background-color", "rgba(0,66,148,0.9)");
                                $("#cadre").addClass("marginCadre");
                            }
                            else{
                                $("#calculateur_header").css("background-color", "rgba(0,66,148,0.9)");
                                $("#bouton_calculateur_inline").css("background-color", "#f99200");
                                $("#cadre").removeClass("marginCadre");
                            }
                        }
                        else{
                            document.getElementById("calculateur_header").className = (currentScroll >= 135) ? "fixed" : "";

                            if(currentScroll >= 135){
                                $("#calculateur_header").css("background-color", "rgba(249, 146, 0,0.9)");
                                $("#bouton_calculateur_inline").css("background-color", "rgba(0,66,148,0.9)");
                                $("#cadre").addClass("marginCadreMobile");
                            }
                            else{
                                $("#calculateur_header").css("background-color", "rgba(0,66,148,0.9)");
                                $("#bouton_calculateur_inline").css("background-color", "#f99200");
                                $("#cadre").removeClass("marginCadreMobile");
                            }
                        }

                    }

                    function afficherCalculateur(){
                        if(width_ecran < 768){
                            $(".form-group-hidden-xs").show(400);
                        }
                    }

                    $(document).ready(function () {
                        addEventListener("scroll", scrolled, false);

                        var div_cliquable = $('#siteWrapper');
                        $(document.body).click(function(e) {
                            // Si ce n'est pas #ma_div ni un de ses enfants
                            if( !$(e.target).is(div_cliquable) && !$.contains(div_cliquable[0],e.target) ) {
                                if($("#immatriculation").val() == ''){
                                    if(width_ecran < 768){
                                        $(".form-group-hidden-xs").hide(400);
                                    }
                                }
                            }
                        });

                        $(document).on("touchstart", function(e) {
                            // Si ce n'est pas #ma_div ni un de ses enfants
                            if( !$(e.target).is(div_cliquable) && !$.contains(div_cliquable[0],e.target) ) {
                                if($("#immatriculation").val() == ''){
                                    if(width_ecran < 768){
                                        $(".form-group-hidden-xs").hide(400);
                                    }
                                }
                            }
                        });
                    });
                </script>


            </div>
        </div>


        <div style="background-color: #f3f3f3;" class="hidden-xs">
            <div class="top_home" style="background: none; padding-top:3px; margin-top:0">
                <div class="col-md-4 col-sm-6 col-xs-4" style="text-align:center; font-weight:bold">
                    <div class="margin_20_mobile" style="margin:0 auto; max-width:180px">
                        <img src="images/franceconnect/Logo_FranceConnect_en_2018.png" alt="FranceConnect" class="img-responsive" style="max-height: 70px; margin: 0 auto;">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-8" style="text-align:center">
                    <div class="margin_20_mobile" style="margin:0 auto; max-width:170px">
                        <div class="count" style="background-image:url(images/commun/pictogrammes/compteur_carte_grise.png); width:140px; height:44px; color:white; font-size:31px; letter-spacing:5px; padding-left:7px; margin:0 auto; margin-top:6px;">721048</div>
                        <div style="clear:both"></div>
                    </div>
                    <div style="font-weight:bold">
                        cartes grises délivrées
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="col-md-4 col-xs-8 hidden-sm hidden-xs" style="text-align:center">
                    <div style="padding-top:10px">
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="font-size:30px"></span>
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="font-size:30px"></span>
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="font-size:30px"></span>
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="font-size:30px"></span>
                        <span class="glyphicon glyphicon-star half" aria-hidden="true" style="font-size:30px"></span><br>
                        <span style="font-weight:bold">Plus de 35000 avis depuis 2011 !</span>
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>
        </div>

        <script>
            $( document ).ready(function() {
                $('.count').each(function () {
                    $(this).prop('Counter',0).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                });
            });
        </script>



        <div id="cadre" class="container">
            <div id="bloc_contenu">
                <div style="margin-top: 30px;">
                    <p>
                        <b>Si un véhicule en France est identifiable grâce à son immatriculation, sa carte grise est le document
                            par excellence qui le définit et qui en donne tous les détails, aussi bien techniques qu'administratifs</b>.
                        C'est en quelque sorte la « carte d'identité » de votre véhicule. Elle est <b>obligatoire pour circuler sur
                            la voie publique pour tous les véhicules</b> (voitures, motos, scooters, tricycles et quadricycles, tracteurs
                        et engins agricoles, remorques de plus de 500kg en PTAC).
                    </p>
                    <p>
                        Indispensable pour utiliser un véhicule en toute légalité, la carte grise, aujourd'hui appelée « <b>Certificat
                            d'immatriculation</b> », est un document strictement réservé aux autorités routières, c'est-à-dire la police ou
                        la gendarmerie. En effet, il n'est en rien considéré comme un document d'état civil ou comme un titre de
                        propriété: il concerne uniquement votre véhicule.
                    </p>
                    <p>
                        Comme pour plusieurs démarches en France, la <b>demande d'un certificat d'immatriculation est entièrement numérisée
                            et ne se fait que sur Internet</b>. Cette mesure fait suite à la fermeture des guichets spécifiques aux services
                        immatriculation des préfectures depuis le 6 novembre 2017. Mesure qui facilite drastiquement la demande et la
                        rend plus fluide.
                    </p>


                    <h2>Comment obtenir votre nouvelle carte grise ?</h2>
                    <div class="row">
                        <div class="col-12 col-md-10">
                            <p>
                                Comme mentionné précédemment, <strong>la demande de carte grise se fait exclusivement sur Internet</strong>. Cette
                                mesure simplifie la procédure et la rend plus accessible à un nombre croissant de demandes que reçoivent
                                les autorités chaque année. Il vous est ainsi possible de demander votre certificat d'immatriculation
                                sans vous déplacer et directement depuis chez vous.
                            </p>
                            <p>
                                Cette simplification de la procédure correspond à deux dates-clés : la première est celle du 15 avril 2009
                                qui coïncide avec <strong>la mise en place du Système d'Immatriculation des Véhicules (SIV)</strong> : une base de données
                                recensant l'intégralité des immatriculations propres à des véhicules terrestres, deux roues et quatre roues
                                compris. Depuis, il vous est possible de faire appel à un professionnel de l'automobile tierce qui se charge
                                de la démarche et qui est habilité et agréé par le Ministère de l'Intérieur.
                                <br>
                                La seconde date est celle du 6 novembre 2017 qui correspond au <strong>Plan Préfectures Nouvelle Génération (PPNG)</strong>.
                                Cette réforme a permis de numériser plusieurs démarches liées à des demandes de documents officiels, incluant
                                entre autres les cartes d'identité, les passeports, les permis de conduire, mais aussi les certificats
                                d'immatriculation dont il est ici question. Cette tendance a eu pour effet d'alléger les contraintes de
                                paperasse et de temps que subissent aussi bien les demandeurs que les employés des préfectures.
                            </p>
                        </div>
                        <div class="col-12 col-md-2">
                            <img src="images/carte-grise.png" alt="carte grise" class="img-responsive">
                        </div>
                    </div>
                    <div style="clear:both"></div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="youtube-mobile">
                                <iframe width="300" height="200" src="https://www.youtube.com/embed/ZbtWppjlXt4" srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/ZbtWppjlXt4?autoplay=1><img src=https://img.youtube.com/vi/ZbtWppjlXt4/hqdefault.jpg alt='Presentation CarteGriseMinute'><span>▶</span></a>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" title="Presentation CarteGriseMinute"></iframe>
                            </div>
                            <div class="youtube-desktop">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/ZbtWppjlXt4" srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/ZbtWppjlXt4?autoplay=1><img src=https://img.youtube.com/vi/ZbtWppjlXt4/hqdefault.jpg alt='Presentation CarteGriseMinute'><span>▶</span></a>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" title="Presentation CarteGriseMinute"></iframe>
                            </div>
                        </div>
                        <div class="col-12 col-md-6" style="padding-top:1rem">
                            <h2>Quels sont les avantages d'une demande de carte grise en ligne ?</h2>
                            <p>
                                Cette numérisation des procédures a facilité la vie à plusieurs acteurs impliqués dans les démarches de
                                demandes de documents officiels, notamment celle du certificat d'immatriculation. Le <a href="/siv.php">Système d'Immatriculation
                                    des Véhicules (SIV)</a> ainsi que la dématérialisation des guichets permet clairement un gain de temps et
                                d'énergie, mais aussi un certain nombre d'avantages qui vont avec cette facilitation.
                                <br><br>
                                Nos services pratiquent une politique de transparence totale quant aux tarifs appliqués pour vos démarches.
                                Vous êtes ainsi informés des montants des taxes et de la démarche directement sur notre site et vous avez
                                la possibilité d'accéder à une facilité de paiement. En effet, il est <a href="/carte-grise-paiement-plusieurs-fois.php">possible de payer en 3 ou 4 fois</a>,
                                par CB.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>
                                Chez cartegriseminute.fr, nous vous proposons de vous accompagner tout au long de votre démarche pour la
                                rendre fluide et rapide. <strong>Grâce à notre habilitation du Ministère de l'Intérieur</strong>, le premier avantage de
                                travailler avec nous est celui de la confiance : vous recevrez votre carte grise conformément à la loi,
                                aux informations exactes de votre état civil et de votre véhicule.
                                <br>
                                Par ailleurs, nos services proposent un suivi personnalisé de la démarche. Il vous est possible à tout moment
                                de nous contacter, de nous poser des questions sur votre dossier et de suivre de près son état d'avancement.
                                Un travail que nous effectuons en étroite collaboration avec nos clients et un <b>gage de confiance</b> qui met
                                l'humain au centre de ces démarches dématérialisées.
                                <br>
                                S'ajoute à ces avantages la garantie d'un <b>traitement de dossier en 24h</b> maximum. En effet, dès votre inscription
                                et l'accomplissement de la démarche en ligne, nous prenons en charge votre dossier de manière instantanée et
                                mettons en œuvre notre énergie et notre expérience pour vous délivrer votre certificat d'immatriculation dans
                                un délai maximal de 24h.
                            </p>
                        </div>
                    </div>


                    <h2>Quelles sont les démarches pouvant être effectuées en ligne ? </h2>
                    <p>
                        En plus d'une demande de certificat d'immatriculation, il vous est possible d'effectuer plusieurs démarches
                        en ligne concernant votre carte grise.
                    </p>

                    <h3>- <b>Changement de titulaire</b></h3>
                    <p>
                        Cette démarche est à effectuer lorsque vous achetez un véhicule d'occasion. Vous êtes dans l'obligation de
                        mettre le certificat d'immatriculation du véhicule à votre nom. La carte grise du véhicule doit être
                        française, indépendamment de son format, c'est-à-dire ancienne ou nouvelle.
                        <br>
                        Lors de l'achat d'un véhicule d'occasion, l'acheteur doit notamment s'assurer de demander au vendeur les
                        documents suivants :<br>
                        • <strong>1 original du <a href="/declaration_cession_vehicule.pdf">Certificat de cession CERFA n° 15776*02</a> rempli et signé par le vendeur</strong>,<br>
                        • <strong>L'original de l'ancienne carte grise, barrée, datée et signée par le vendeur</strong>.<br>
                        Ces deux documents indispensables doivent être joints aux autres <b>documents pour effectuer une
                            <a href="/vos-demarches-changement-de-titulaire-carte-grise.php">demande de changement de titulaire en ligne</a></b>.
                    </p>

                    <h3>- <b>Immatriculation d'un véhicule neuf</b></h3>
                    <p>La <a href="/vos-demarches-carte-grise-vehicule-neuf.php">procédure d'immatriculation d'un véhicule neuf</a> concerne les véhicules n'ayant jamais roulé auparavant. Ils doivent être conformes à la loi et dotés d'une immatriculation nouvelle qui est délivrée avec la demande de certificat d'immatriculation. Cette demande, comme d'autres, se fait en ligne et comprend certaines démarches à suivre.</p>
                    <p>À terme, vous devrez faire poser des plaques d'immatriculation minéralogiques pour pouvoir circuler librement sur la voie publique. Ces plaques auront un numéro unique qui caractérisera votre véhicule et qui sera délivré suivant un format bien précis doté de deux lettres, de trois chiffres puis de deux lettres : AA-123-AA.</p>

                    <h3>- <b>Changement d'adresse sur votre carte grise</b></h3>
                    <p>Déménagement, changement du nom de votre rue… On oublie souvent que changer d’adresse implique non seulement une logistique lourde mais aussi de nombreuses démarches administratives. La mise à jour de la carte grise n’échappe pas à la règle même si c'est le nom de votre rue qui change. Les titulaires d’un certificat d’immatriculation dont la plaque et au format SIV recevront une <b>étiquette à coller sur leur carte grise pour en modifier l’adresse</b>.</p>
                    <p>Simplifiez vous la vie et faites votre changement d'adresse carte grise en ligne.</p>

                    <h3>- <b>Duplicata du certificat d'immatriculation</b></h3>
                    <p>Cette démarche est à effectuer dans certains cas bien précis, notamment lorsqu'il s'agit de rééditer votre certificat d'immatriculation. Dans des cas de vol de carte grise, <a href="/vos-demarches-perte-carte-grise.php">de perte</a> ou de détérioration du document, vous êtes dans l'obligation de régulariser votre situation et de faire une demande de <a href="/vos-demarches-duplicata-carte-grise.php">duplicata de carte grise</a>.</p>
                    <p>Celle-ci s'effectue directement en ligne et vous permet de circuler sans encombre ; <b>le duplicata étant la copie conforme de votre carte grise perdue, volée ou détériorée</b>. Rappelons que la non-présentation d'un certificat d'immatriculation lors d'un contrôle de police ou de la gendarmerie peut vous coûter 11 € dans un premier temps, puis 135 € si vous ne présentez pas votre carte grise à un commissariat dans les 5 jours suivants le contrôle.</p>

                    <h3>- <b>Changement d'état civil ou matrimonial</b></h3>
                    <p>Vous êtes dans l’obligation de signaler à la préfecture tout cas de changement d’état civil, d’état matrimonial ou de raison sociale. La carte grise doit obligatoirement être mise à jour. Les formalités en cas de changement d’état matrimonial (mariage, divorce ou veuvage) sont gratuites et celles pour le changement de raison social ou d’état civil disposent d’une taxe fixe.</p>

                    <h3>- <b>Déclaration de cession</b></h3>
                    <p>Ne prenez pas de risques et informez rapidement l'administration de la vente de votre véhicule. Vous éviterez les mauvaises surprises sous la forme d'un ou plusieurs procès-verbaux. C'est le moyen le plus simple et le plus rapide.</p>
                    <p>Quelle que soit votre demande de carte grise, n'oubliez pas de télécharger et joindre les documents cerfa pour que votre démarche puisse être traitée sous 24H.</p>

                    <h3>- <b>Calcul du tarif du certificat d'immatriculation</b></h3>
                    <p>Plusieurs critères sont à prendre en compte pour calculer le tarif de votre carte grise. L'élément principal à considérer est le prix du cheval fiscal de votre région. En effet, chaque région établit librement un montant lié à la taxe qui touche directement la puissance fiscale de votre véhicule.</p>
                    <p>Vous devez faire une multiplication entre le <a href="/chevaux-fiscaux-chevaux-din.php">nombre de chevaux fiscaux du moteur de votre véhicule</a> et le tarif appliqué par votre région.</p>


                    <h2>Faire sa carte grise simplement, les démarches en 4 étapes</h2>
                    <div class="row demarche-bloc">
                        <div class="col-sm-6 col-md-3">
                            <div class="demarche-wrapper">
                                <div class="demarche-image-wrapper">
                                    <img class="img-index-demarche" src="../../images/index/1-carte-grise-calcul-prix.svg" alt="">
                                </div>
                                <div class="demarche-text-wrapper">
                                    <div>
                                        <h3 class="demarche-title">1. Je calcule le prix</h3>
                                    </div>

                                    <div class="demarche-p-wrapper">
                                        <p class="demarche-p">Utilisez le calculateur de tarif pour connaître le montant de la carte grise avec votre numéro d'immatriculation.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="demarche-wrapper">
                                <div class="demarche-image-wrapper">
                                    <img class="img-index-demarche" src="../../images/index/2-carte-grise-paiement-en-ligne.svg" alt="">
                                </div>
                                <div class="demarche-text-wrapper">
                                    <div>
                                        <h3 class="demarche-title">2. Je paye en ligne</h3>
                                    </div>

                                    <div class="demarche-p-wrapper">
                                        <p class="demarche-p">Renseignez vos coordonnées et payez le montant par CB, avec possibilité de régler en 3 ou 4 fois*</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="demarche-wrapper">
                                <div class="demarche-image-wrapper">
                                    <img class="img-index-demarche" src="../../images/index/3-carte-grise-envoi-documents.svg" alt="">
                                </div>
                                <div class="demarche-text-wrapper">
                                    <div>
                                        <h3 class="demarche-title">3. Je complète mon dossier</h3>
                                    </div>
                                    <div class="demarche-p-wrapper">
                                        <p class="demarche-p">Envoyez par courrier les documents demandés. Dossier traité en 24H si tout est conforme et validé, sinon vous serez averti par email</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="demarche-wrapper">
                                <div class="demarche-image-wrapper">
                                    <img class="img-index-demarche" src="../../images/index/4-envoi-carte-grise-domicile.svg" alt="">
                                </div>
                                <div class="demarche-text-wrapper">
                                    <div>
                                        <h3 class="demarche-title">4. Je reçois la carte grise</h3>
                                    </div>
                                    <div class="demarche-p-wrapper">
                                        <p class="demarche-p">Un certificat provisoire d’immatriculation vous permettra de circuler en attendant votre carte grise définitive expédiée par l’Imprimerie Nationale sous 2 à 4 jours</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="clear:both"></div>
                    </div>


                    <h2>Comment le prix de ma carte est-il calculé ?</h2>
                    <p>Le tarif de la carte grise est calculé sur plusieurs critères spécifiques à chaque véhicule à immatriculer. Le prix du cheval fiscal de votre région de résidence est sans aucun doute le plus important, mais pas nécessairement le seul. <strong>Utilisez notre calculateur pour obtenir votre tarif en quelques clics.</strong>.</p>


                    <h2 id="leader-carte-grise">CarteGriseMinute, n°1 de la carte grise pas chère en ligne</h2>
                    <p itemprop="description" align="justify">
                        Plus de <strong>10000 clients chaque mois</strong> nous mandatent et nous font confiance pour établir leur nouvelle <em>carte grise</em>. Vous aussi, pour toutes vos démarches, <a href="/carte-grise-minute.php">commandez en toute simplicité votre carte grise en 5 minutes</a>. Economisez du temps et de l'argent. Envoyez vos documents et si le dossier est complet et conforme vous recevrez votre certificat d'immatriculation provisoire sous 24H*.
                    </p>
                    <p align="justify">Notre équipe de conseiller(e)s dédié carte grise se tient à votre disposition en cas de dossiers incomplets ou pour répondre à toutes vos questions grâce à sa « Ligne Info CarteGriseMinute ». Dans votre Espace Client, vous pourrez suivre l’avancement de votre demande et télécharger les éléments de dossier qui pourraient être demandés (CERFA, Mandat…). Pour simplifier la démarche en ligne, ces derniers sont pré-remplis avec vos informations et prêts à être imprimés.</p>
                    <ul>
                        <li>+ de 10&nbsp;000 demandes validées chaque mois,</li>
                        <li>+ de 600&nbsp;000 cartes grises délivrées (depuis 2009),</li>
                        <li>+ de 180&nbsp;000 calculs du montant de la taxe fiscale par mois,</li>
                        <li>+ de 35&nbsp;000 avis depuis 2011 recommandent les services de cartegriseminute.fr</li>
                    </ul>
                    <p>Cartegriseminute.fr est un site édité par MBC, société agréée (n° 13673) par le Ministère de l'Intérieur et habilités (n° 1792) par le Trésor Public. Non affiliés au gouvernement, en nous mandatant, vous évitez les retards du site officiel pour le traitement officiel de vos cartes grises.</p>


                    <h2>Les avantages de CarteGriseMinute</h2>
                    <div>
                        <ul style="padding-left:15px">
                            <li><strong>Payez en 3 ou 4 fois :</strong> Contrairement à l'Administration, nous vous proposons le
                                règlement de votre carte grise en 3x/4x par CB,</li>
                            <li><strong>Gain de temps :</strong> Plus besoin de perdre du temps pour votre carte grise et pour vos plaques d'immatriculations. Vous choisissez le logo de région et le numéro de département parmi nos 100 références départementales. Pour un coût supplémentaire à partir de 29,90 € seulement pour votre carte grise à domicile,</li>
                            <li><strong>Formulaires CERFA :</strong> tous les documents administratifs nécessaires aux démarches de carte grise sont disponibles en téléchargement sur le site,</li>
                            <li><strong>Proximité :</strong> Vous êtes dans les Hauts-de-Seine ou à Paris ? Passez nous voir, <a href="/agence-boulogne-billancourt-92.php">notre agence de Boulogne-Billancourt</a> vous accueille (du lundi au jeudi, 9h-12h30 13h30-18h (17h le vendredi)), vous repartez en 5 min avec votre carte grise et vos nouvelles plaques d'immatriculation,</li>
                            <li><strong>Economie :</strong> Avec le site Internet, pas de déplacement, pas de frais de parking, pas d'attente,…,</li>
                            <li><strong>Souplesse :</strong> Grâce au système de demande de carte grise en ligne, vous commandez depuis chez vous votre carte grise (certificat d'immatriculation) quand vous le souhaitez,</li>
                        </ul>
                    </div>


                    <div class="row faq-wrapper">
                        <div class="col-12 title-faq-wrapper">
                            <p class="title title-desktop">Questions Fréquentes et Réponses</p>
                            <p class="title title-mobile">Questions Fréquentes</p>
                        </div>
                        <div class="col-12">
                            <div class="row qr-wrapper">
                                <div class="col-12">
                                    <div class="d-flex flex-row question-wrapper">
                                        <div>
                                            <h2 class="question">
                                                Quel est le délai pour recevoir la nouvelle carte grise ?                            </h2>
                                        </div>
                                        <div class="icon-wrapper">
                                            <p class="arrow-right-wrapper">
                                                <img src="https://www.cartegriseminute.fr//images/icons/right-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                            <p class="arrow-down-wrapper d-none">
                                                <img src="https://www.cartegriseminute.fr//images/icons/down-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="reponse-wrapper d-none">
                                        <p class="reponse">
                                            A réception d'un dossier complet, le dossier sera vérifié et transmis à l'imprimerie nationale pour fabrication sous un délai de 24 à 48h dès réception. Ainsi, la carte grise sera expediée à l'usager sous maximum 7 jours.<br><br>                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row qr-wrapper">
                                <div class="col-12">
                                    <div class="d-flex flex-row question-wrapper">
                                        <div>
                                            <h2 class="question">
                                                Faut-il impérativement un code de cession pour faire sa demande ?                            </h2>
                                        </div>
                                        <div class="icon-wrapper">
                                            <p class="arrow-right-wrapper">
                                                <img src="https://www.cartegriseminute.fr//images/icons/right-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                            <p class="arrow-down-wrapper d-none">
                                                <img src="https://www.cartegriseminute.fr//images/icons/down-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="reponse-wrapper d-none">
                                        <p class="reponse">
                                            Le code de cession est généré si la vente a été enregistrée sur le site <a href="/ANTS-carte-grise.php">ANTS</a> (Agence Nationale des Titres Sécurisés). L'ancien propriétaire va fournir un code à cinq chiffres à son acheteur afin que celui-ci puisse immatriculer le véhicule à son nom. Le vendeur doit enregistrer la cession sous 15 jours et aura le code de cession valide pendant 15 jours.<br>Si l'acheteur n'immatricule pas son véhicule sous deux semaines après l'obtention du code ou si l'acheteur n'a pas de code de cession du fait qu'il a enregistré la vente auprès d'un professionnel habilité par le Ministère de l'Intérieur, il sera possible de faire sa demande d'immatriculation sur le site cartegriseminute.fr. Le code de cession n'est pas nécessaire si l'acquéreur fait appel à un professionnel habilité et agréé.                         </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row qr-wrapper">
                                <div class="col-12">
                                    <div class="d-flex flex-row question-wrapper">
                                        <div>
                                            <h2 class="question">
                                                Le Certificat Provisoire d'Immatriculation peut-il remplacé la carte grise ?                            </h2>
                                        </div>
                                        <div class="icon-wrapper">
                                            <p class="arrow-right-wrapper">
                                                <img src="https://www.cartegriseminute.fr//images/icons/right-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                            <p class="arrow-down-wrapper d-none">
                                                <img src="https://www.cartegriseminute.fr//images/icons/down-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="reponse-wrapper d-none">
                                        <p class="reponse">
                                            Le CPI ou certificat provisoire d'immatriculation est délivré à l'usager avant qu'il reçoit sa carte grise définitive par la poste. Le CPI autorise, pendant un délai d'un mois, la circulation du véhicule en France. L'usager devra poser ses nouvelles plaques s'il y a eu un changement du numéro d'immatriculation.<br>Ce document est récupéré sur le SIV par le professionnel habilité ou sur le site ANTS et se présente sous forme d'imprimé sur papier classique.                         </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row qr-wrapper">
                                <div class="col-12">
                                    <div class="d-flex flex-row question-wrapper">
                                        <div>
                                            <h2 class="question">
                                                Que faut-il faire pour changer une voiture de société en VP ?                            </h2>
                                        </div>
                                        <div class="icon-wrapper">
                                            <p class="arrow-right-wrapper">
                                                <img src="https://www.cartegriseminute.fr//images/icons/right-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                            <p class="arrow-down-wrapper d-none">
                                                <img src="https://www.cartegriseminute.fr//images/icons/down-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="reponse-wrapper d-none">
                                        <p class="reponse">
                                            Suite à une modification du nombre de places, par exemple un véhicule de société de 2 places à transformer en VP de 5 places, il faut impérativement mettre à jour la carte grise. Si la pose de la banquette et des ceintures de sécurité ont été faits par un professionnel, ce dernier délivrera une conformité de transformation nécessaire pour changer le genre du véhicule de <a href="/carte-grise-camionnette.php">CTTE</a> en VP. Dans le cas contraire, le véhicule doit passer au DREAL pour une réception à titre isolé (RTI) ou faire validé la modification par le constructeur.                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row qr-wrapper">
                                <div class="col-12">
                                    <div class="d-flex flex-row question-wrapper">
                                        <div>
                                            <h2 class="question">
                                                Pour quelle raison faut-il fournir un cerfa de demande de certificat d'immatriculation ?                            </h2>
                                        </div>
                                        <div class="icon-wrapper">
                                            <p class="arrow-right-wrapper">
                                                <img src="https://www.cartegriseminute.fr//images/icons/right-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                            <p class="arrow-down-wrapper d-none">
                                                <img src="https://www.cartegriseminute.fr//images/icons/down-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="reponse-wrapper d-none">
                                        <p class="reponse">
                                            Pour toute démarche de carte grise, afin de permettre la modification concernant les informations du véhicule et de son propriétaire, le document "Demande de Certificat d'Immatriculation" ou CERFA 13750 est requis.<br>Il permet de savoir précisément le type de démarche voulue par le demandeur.                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row qr-wrapper">
                                <div class="col-12">
                                    <div class="d-flex flex-row question-wrapper">
                                        <div>
                                            <h2 class="question">
                                                Est-il possible de demander un changement de nom et d'adresse en même temps ?                            </h2>
                                        </div>
                                        <div class="icon-wrapper">
                                            <p class="arrow-right-wrapper">
                                                <img src="https://www.cartegriseminute.fr//images/icons/right-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                            <p class="arrow-down-wrapper d-none">
                                                <img src="https://www.cartegriseminute.fr//images/icons/down-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="reponse-wrapper d-none">
                                        <p class="reponse">
                                            Dans le cas où l'on a fait l'acquisition d'un véhicule et qu'entre temps, le domicile à changer, deux démarches s'imposent: la demande de changement de titulaire puisqu'on dispose d'un délai d'un mois après l'acquisition pour refaire la carte grise à son nom et le changement de domicile pour déclarer la nouvelle adresse. Ces deux démarches peuvent se faire en même temps à condition de transmettre un document intitulé "Demande de Certificat d'Immatriculation", sur lequel doivent êtres cochés les cases suivantes: "CERTIFICAT" et "CHANGEMENT DE DOMICILE".                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row qr-wrapper">
                                <div class="col-12">
                                    <div class="d-flex flex-row question-wrapper">
                                        <div>
                                            <h2 class="question">
                                                Pour un véhicule importé neuf, est-t-il obligatoire de fournir un quitus fiscal?                            </h2>
                                        </div>
                                        <div class="icon-wrapper">
                                            <p class="arrow-right-wrapper">
                                                <img src="https://www.cartegriseminute.fr//images/icons/right-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                            <p class="arrow-down-wrapper d-none">
                                                <img src="https://www.cartegriseminute.fr//images/icons/down-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="reponse-wrapper d-none">
                                        <p class="reponse">
                                            Le quitus fiscal est obligatoire pour les particuliers ou les professionnels.<br>Les véhicules considérés comme neufs sont exonérés de la taxe fiscale.<br>Les critères permettant d'indiquer qu'un véhicule est neuf se jugent par le kilométrage du véhicule et sa date de première mise en circulation. Ceux-ci correspondent à une première mise en circulation de moins de 6 mois, avec au compteur kilométrique de moins de 6000km.<br>                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row qr-wrapper">
                                <div class="col-12">
                                    <div class="d-flex flex-row question-wrapper">
                                        <div>
                                            <h2 class="question">
                                                Est-t-il possible de demander une carte grise avec une personne physique comme « titulaire principal » et une personne morale en tant que « Co titulaire »?                            </h2>
                                        </div>
                                        <div class="icon-wrapper">
                                            <p class="arrow-right-wrapper">
                                                <img src="https://www.cartegriseminute.fr//images/icons/right-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                            <p class="arrow-down-wrapper d-none">
                                                <img src="https://www.cartegriseminute.fr//images/icons/down-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="reponse-wrapper d-none">
                                        <p class="reponse">
                                            Oui, c'est possible de demander une carte grise avec une personne physique comme « titulaire principale » et une personne morale en tant que « Co titulaire » et l'inverse également.<br>Il faut que l'acquéreur et le Co acquéreur soient bien notés sur la déclaration de cession.<br>Il est aussi possible qu'une personne physique désigne sa société comme « titulaire principal » et lui en « Co titulaire » s'il n'a pas le permis de conduire alors qu'il est le seul sur la déclaration de cession comme nouveau titulaire, pour traiter une démarche de changement de titulaire.<br>                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row qr-wrapper">
                                <div class="col-12">
                                    <div class="d-flex flex-row question-wrapper">
                                        <div>
                                            <h2 class="question">
                                                Un véhicule sans permis doit-t-il repasser le contrôle technique pour un changement de titulaire ?                            </h2>
                                        </div>
                                        <div class="icon-wrapper">
                                            <p class="arrow-right-wrapper">
                                                <img src="https://www.cartegriseminute.fr//images/icons/right-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                            <p class="arrow-down-wrapper d-none">
                                                <img src="https://www.cartegriseminute.fr//images/icons/down-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="reponse-wrapper d-none">
                                        <p class="reponse">
                                            Les véhicules standards doivent passer au contrôle technique tous les deux ans.<br>Pour le cas des véhicules sans permis, ces derniers étant considérés comme des véhicules spéciaux, il n'est pas obligatoire pour ces derniers de passer au contrôle technique, pour un changement de titulaire ; tout comme les motos, quad ou scooter.<br>                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row qr-wrapper">
                                <div class="col-12">
                                    <div class="d-flex flex-row question-wrapper">
                                        <div>
                                            <h2 class="question">
                                                Pourquoi joindre la demande de certificat d'immatriculation si celle-ci reste inchanger?                            </h2>
                                        </div>
                                        <div class="icon-wrapper">
                                            <p class="arrow-right-wrapper">
                                                <img src="https://www.cartegriseminute.fr//images/icons/right-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                            <p class="arrow-down-wrapper d-none">
                                                <img src="https://www.cartegriseminute.fr//images/icons/down-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="reponse-wrapper d-none">
                                        <p class="reponse">
                                            A titre d'information, pour toute démarche de carte grise la demande de certificat d'immatriculation est obligatoire même si le véhicule en question ne change pas de numéro, ce document comporte les informations du véhicule et le titulaire.                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row qr-wrapper">
                                <div class="col-12">
                                    <div class="d-flex flex-row question-wrapper">
                                        <div>
                                            <h2 class="question">
                                                Est-il possible de mettre plusieurs co-titulaires sur une CG?                            </h2>
                                        </div>
                                        <div class="icon-wrapper">
                                            <p class="arrow-right-wrapper">
                                                <img src="https://www.cartegriseminute.fr//images/icons/right-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                            <p class="arrow-down-wrapper d-none">
                                                <img src="https://www.cartegriseminute.fr//images/icons/down-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="reponse-wrapper d-none">
                                        <p class="reponse">
                                            Effectivement c'est possible d'ajouter des co-titulaires sur la carte grise mais il ne faut surtout pas oublier de mettre leur nom sur la déclaration de cession ainsi que la signature et également sur la demande de certificat d'immatriculation, en outre, il faut joindre aussi la copie recto verso de leur pièce d'identité valide.                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row qr-wrapper">
                                <div class="col-12">
                                    <div class="d-flex flex-row question-wrapper">
                                        <div>
                                            <h2 class="question">
                                                Est-il possible de déposer les documents à main propre ?                            </h2>
                                        </div>
                                        <div class="icon-wrapper">
                                            <p class="arrow-right-wrapper">
                                                <img src="https://www.cartegriseminute.fr//images/icons/right-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                            <p class="arrow-down-wrapper d-none">
                                                <img src="https://www.cartegriseminute.fr//images/icons/down-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="reponse-wrapper d-none">
                                        <p class="reponse">
                                            Effectivement, vous avez la possibilité de déposer les documents à l'agence directement. L'adresse est la suivante CarteGriseMinute.fr 12-14, rue Lazare HocheCS 60058/ 92774 Boulogne-Billancourt.<br>92774 BOULOGNE-BILLANCOURT CEDEX                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row qr-wrapper">
                                <div class="col-12">
                                    <div class="d-flex flex-row question-wrapper">
                                        <div>
                                            <h2 class="question">
                                                Quels sont les documents à envoyer pour immatriculer un véhicule neuf?                            </h2>
                                        </div>
                                        <div class="icon-wrapper">
                                            <p class="arrow-right-wrapper">
                                                <img src="https://www.cartegriseminute.fr//images/icons/right-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                            <p class="arrow-down-wrapper d-none">
                                                <img src="https://www.cartegriseminute.fr//images/icons/down-arrow-bold.svg" class="icon-details-question" alt="en details">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="reponse-wrapper d-none">
                                        <p class="reponse">
                                            Pour immatriculer un véhicule neuf, vous devriez préparer les éléments suivants :<br>-La facture d'achat originale<br>-Le certificat de conformité originale<br>-La demande de certificat d'immatriculation originale<br>-La <a href="/mandat-immatriculation.php">procuration par mandat</a> originale<br>-La copie recto verso de la pièce d'identité valide<br>-La copie recto verso du permis de conduire<br>-La copie d'attestation d'assurance ou la carte verte en cours de validité<br>-Le <a href="/justificatifs-domicile.php">justificatif de domicile</a> moins de 6 mois.                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <h2>Questions souvent posées</h2>
                    <ul style="padding-left:0">
                        <li style="list-style:none; padding-bottom: 10px;"><a class="lien" href="/vos-demarches-vente-voiture.php">Quelles démarches pour vendre mon véhicule ?</a></li>
                        <li style="list-style:none; padding-bottom: 10px;"><a class="lien" href="/carte-grise-prix.php">Quel est le prix d'une carte grise ?</a></li>
                        <li style="list-style:none; padding-bottom: 10px;"><a class="lien" href="/tarif-carte-grise-region.php">Quel est le tarif du cheval fiscal dans mon département ?</a></li>
                        <li style="list-style:none; padding-bottom: 10px;"><a class="lien" href="/vos-demarches-duplicata-carte-grise.php">Comment obtenir un duplicata de carte grise ?</a></li>
                        <li style="list-style:none; padding-bottom: 10px;"><a class="lien" href="/vos-demarches-changement-d-adresse-carte-grise.php">Comment faire le changement d'adresse d'une carte grise ?</a></li>
                        <li style="list-style:none; padding-bottom: 10px;"><a class="lien" href="/justificatifs-domicile.php">Quels sont les justificatifs de domicile acceptés pour une démarche de carte grise ?</a></li>
                    </ul>


                    <h2>Est ce que je peux encore faire ma carte grise en préfecture ?</h2>
                    <p>Depuis le 15 avril 2009, vous n'avez plus l'obligation de passer en préfecture pour obtenir votre nouvelle carte grise. Le SIV vous permet de passer par un professionnel de l'automobile agréé et habilité par le Ministère de l'Intérieur ; que ce soit sur internet ou dans un établissement physique. Ce professionnel pourra vous délivrer un Certificat provisoire d'immatriculation ou un Accusé d'enregistrement. L'intérêt du gain de temps est immédiat puisque les usagers n'ont plus l'obligation de se déplacer en préfecture.</p>
                    <p>Ensuite, depuis la mise en place du plan préfectures nouvelle Génération (6 novembre 2017), les usagers ne peuvent plus obtenir leur certificat d'immatriculation en se déplaçant directement ou en envoyant leur dossier par la poste. Toutes les démarches d'immatriculation d'une voiture neuve ou d'occasion doivent se réaliser via une téléprocédure ; c'est-à-dire sur internet auprès d'un professionnel agréé.</p>
                    <p>Cependant, la France comportant de nombreuses zones blanches en matière de connection internet (tout le monde n'habite pas un grand centre urbain), il a été décidé la mise en place de <em>points numériques pour réaliser votre démarche en ligne</em>.</p>
                    <p>Quel que soit la demande, vous recevrez un CPI (si votre véhicule comportait des plaques à l'ancienne numérotation) ou un accusé d'enregistrement (si le véhicule était déjà équipé de plaque à nouvelle numérotation). L'un comme l'autre vous permettront de circuler, en France ou à l'étranger, pendant un mois.</p>
                    <p>Enfin, il vous est possible de suivre l'avancement dans l'édition et l'envoi de votre carte grise définitive via : <a href="https://immatriculation.ants.gouv.fr/Services-associes/Ou-en-est-ma-carte-grise" target="_blank">https://immatriculation.ants.gouv.fr/Services-associes/Ou-en-est-ma-carte-grise</a>.</p>
                </div>


                <div>
                    <h2>Commandez aussi vos plaques d'immatriculation</h2>
                    <p>
                        En plus de votre carte grise, pensez à commander parmi nos gammes de plaques d'immatriculation PVC ou Plexyglass si votre numéro d'immatriculation change ou si vous souhaitez simplement modifier l'identifiant de département sur vos plaques. Nous avons en stock les 100 départements français. A ne pas oublier lors de votre <a href="/formulaires-officiels-cerfa.php">demande de carte grise</a>.
                    </p>
                    <p>
                        Pour une installation facile sur votre véhicule :
                        <br>
                        Afin d'installer facilement vos plaques, la <strong>pince à rivets</strong> (valeur 10 €) est offerte pour tout achat d'un jeu de plaque Plexiglass PREMIUM Luxe. Pour les autres modèles de jeu de plaques (PVC), cet outil bien pratique est proposée à moitié prix.
                    </p>
                </div>


                <div style="clear:both"></div>
                <h2>Carte grise des modèles de voiture les plus vendus en France en 2023</h2>
                <div>

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="thumbnail" style="min-height:193px;">
                            <a href="/marques/renault/50-clio"><img src="/images/modeles/renault_50.jpg" style="max-height: 135px;" class="img-responsive" alt="carte grise Renault Clio IV"></a>
                            <div class="caption">
                                <a href="/marques/renault/50-clio" class="btn btn-default center-block">
                                    Renault Clio IV</a>
                            </div>
                            <div>
                                La citadine Renault Clio est le modèle le plus vendu en France.
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="thumbnail" style="min-height:193px;">
                            <a href="/marques/peugeot/45-208"><img src="/images/modeles/peugeot_45.jpg" style="max-height: 135px;" class="img-responsive" alt="carte grise Peugeot 208"></a>
                            <div class="caption">
                                <a href="/marques/peugeot/45-208" class="btn btn-default center-block">
                                    Peugeot 208</a>
                            </div>
                            <div>
                                Juste derrière sa rivale de Renault, la Peugeot 208 est très demandé.
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="thumbnail" style="min-height:193px;">
                            <a href="/marques/peugeot/46-3008"><img src="/images/modeles/peugeot_46.jpg" style="max-height: 135px;" class="img-responsive" alt="carte grise Peugeot 3008"></a>
                            <div class="caption">
                                <a href="/marques/peugeot/46-3008" class="btn btn-default center-block">
                                    Peugeot 3008 II</a>
                            </div>
                            <div>
                                Premier SUV vendu en France, le Peugeot 3008 II est une vraie réussite.
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="thumbnail" style="min-height:193px;">
                            <a href="/marques/citroen/33-c3"><img src="/images/modeles/citroen_33.jpg" style="max-height: 135px;" class="img-responsive" alt="carte grise Citrën C3 III"></a>
                            <div class="caption">
                                <a href="/marques/citroen/33-c3" class="btn btn-default center-block">
                                    Citroën C3 III</a>
                            </div>
                            <div>
                                La citadine Citroën C3 III est accrochée à sa quatrième place du podium.
                            </div>
                        </div>
                    </div>        </div>
                <div style="clear:both"></div>


                <div style="clear:both"></div>
                <h2>Carte grise par genre de véhicule</h2>
                <div>
                    <!--div class="col-xs-6 col-sm-4 col-md-3">
                        <div class="thumbnail" style="min-height:173px;">
                            <a href="/carte-grise-moto.php"><img src="/images/commun/genre_vehicule/thumbnails/moto.jpg" style="max-height: 150px;" class="img-responsive" alt="carte grise moto"></a>
                            <div class="caption">
                                <a href="/carte-grise-moto.php" class="btn btn-default center-block">
                                Carte Grise Moto</a>
                            </div>
                        </div>
                    </div-->
                    <div class="col-xs-6 col-sm-4 col-md-3">
                        <div class="thumbnail" style="min-height:173px;">
                            <b>2 roues</b>
                            <br>
                            <img src="/images/commun/genre_vehicule/thumbnails/scooter.jpg" style="max-height: 150px;" class="img-responsive" alt="carte grise scooter">
                            <div class="caption">
                                <a href="/carte-grise-moto.php" class="btn btn-default center-block">
                                    Carte Grise Moto</a>
                            </div>
                            <div class="caption">
                                <a href="/carte-grise-scooter.php" class="btn btn-default center-block">
                                    Carte Grise Scooter</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3">
                        <div class="thumbnail" style="min-height:173px;">
                            <b>Utilitaires</b>
                            <br>
                            <img src="/images/commun/genre_vehicule/thumbnails/camion.jpg" style="max-height: 150px;" class="img-responsive" alt="carte grise camion">
                            <div class="caption">
                                <a href="/carte-grise-camionnette.php" class="btn btn-default center-block">
                                    Carte Grise CTTE</a>
                            </div>
                            <div class="caption">
                                <a href="/carte-grise-camion.php" class="btn btn-default center-block">
                                    Carte Grise Camion</a>
                            </div>
                        </div>
                    </div>
                    <!--div class="col-xs-6 col-sm-4 col-md-3">
                        <div class="thumbnail" style="min-height:173px;">
                            <a href="/carte-grise-camion.php"><img src="/images/commun/genre_vehicule/thumbnails/camion.jpg" style="max-height: 150px;" class="img-responsive" alt="carte grise camion"></a>
                            <div class="caption">
                                <a href="/carte-grise-camion.php" class="btn btn-default center-block">
                                Carte Grise Camion</a>
                            </div>
                        </div>
                    </div-->
                    <div class="col-xs-6 col-sm-4 col-md-3">
                        <div class="thumbnail" style="min-height:173px;">
                            <b>Véhicules spécialisés</b>
                            <br>
                            <img src="/images/commun/genre_vehicule/thumbnails/vasp.jpg" style="max-height: 150px;" class="img-responsive" alt="carte grise vasp">
                            <div class="caption">
                                <a href="/carte-grise-vasp.php" class="btn btn-default center-block">
                                    Carte Grise VASP / REM</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3">
                        <div class="thumbnail" style="min-height:173px;">
                            <b>Véhicules agricoles</b>
                            <br>
                            <img src="/images/commun/genre_vehicule/thumbnails/tracteur.jpg" style="max-height: 150px;" class="img-responsive" alt="carte grise tracteur">
                            <div class="caption">
                                <a href="/carte-grise-tracteur-agricole.php" class="btn btn-default center-block">
                                    Carte Grise Tracteur</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear:both"></div>


                <div style="clear:both"></div>
                <h2>Carte grise dans les principales villes</h2>
                <div>

                    <div class="col-xs-6 col-sm-6 col-md-2">
                        <div class="thumbnail" style="min-height:160px;">
                            <a href="/tarif-carte-grise-region/12-ile-de-france/prix-carte-grise-75-paris"><img src="/images/villes/thumbnails/carte-grise-paris-1.jpg" style="max-height: 80px;" class="img-responsive" alt="carte grise à Paris"></a>
                            <div class="caption">
                                <a href="/tarif-carte-grise-region/12-ile-de-france/prix-carte-grise-75-paris" class="btn btn-default center-block">
                                    Carte Grise<br>à Paris</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-2">
                        <div class="thumbnail" style="min-height:160px;">
                            <a href="/tarif-carte-grise-region/21-provence-alpes-cote-d-azur/prix-carte-grise-13-bouches-du-rhone/prefecture-marseille-13"><img src="/images/villes/thumbnails/carte-grise-marseille.jpg" style="max-height: 80px;" class="img-responsive" alt="carte grise à Marseille"></a>
                            <div class="caption">
                                <a href="/tarif-carte-grise-region/21-provence-alpes-cote-d-azur/prix-carte-grise-13-bouches-du-rhone/prefecture-marseille-13" class="btn btn-default center-block">
                                    Carte Grise<br>à Marseille</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-2">
                        <div class="thumbnail" style="min-height:160px;">
                            <a href="/tarif-carte-grise-region/34-occitanie/prix-carte-grise-31-haute-garonne/prefecture-toulouse-31"><img src="/images/villes/thumbnails/carte-grise-toulouse.jpg" style="max-height: 80px;" class="img-responsive" alt="carte grise à Toulouse"></a>
                            <div class="caption">
                                <a href="/tarif-carte-grise-region/34-occitanie/prix-carte-grise-31-haute-garonne/prefecture-toulouse-31" class="btn btn-default center-block">
                                    Carte Grise<br>à Toulouse</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-2">
                        <div class="thumbnail" style="min-height:160px;">
                            <a href="/tarif-carte-grise-region/21-provence-alpes-cote-d-azur/prix-carte-grise-06-alpes-maritimes/prefecture-nice-06"><img src="/images/villes/thumbnails/carte-grise-nice.jpg" style="max-height: 80px;" class="img-responsive" alt="carte grise à Nice"></a>
                            <div class="caption">
                                <a href="/tarif-carte-grise-region/21-provence-alpes-cote-d-azur/prix-carte-grise-06-alpes-maritimes/prefecture-nice-06" class="btn btn-default center-block">
                                    Carte Grise<br>à Nice</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-2">
                        <div class="thumbnail" style="min-height:160px;">
                            <a href="/tarif-carte-grise-region/35-auvergne-rhone-alpes/prix-carte-grise-69-rhone/prefecture-lyon-69"><img src="/images/villes/thumbnails/carte-grise-lyon.jpg" style="max-height: 80px;" class="img-responsive" alt="carte grise à Lyon"></a>
                            <div class="caption">
                                <a href="/tarif-carte-grise-region/35-auvergne-rhone-alpes/prix-carte-grise-69-rhone/prefecture-lyon-69" class="btn btn-default center-block">
                                    Carte Grise<br>à Lyon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear:both"></div>


                <div class="row">
                    <div class="col-md-9">
                        <h2>Dernier<span class="hidden-xs">s</span> témoignage<span class="hidden-xs">s</span> client<span class="hidden-xs">s</span> sur eKomi.fr</h2>
                        <div>
                            <div class="col-md-12 ">
                                <!--img src="../images/eKomi/visage/visage_10.jpg" class="img-circle img-thumbnail img-responsive" alt="Photo client"-->
                                <div style="margin-top:15px">
                                    <span class="glyphicon glyphicon-comment" aria-hidden="true" style="color: #19559e;"></span>
                                    Rapide, efficace. Merci !								<span style="margin-top:5px; font-style:italic; color:#555;"> - le 29-07-2022 08:59:27</span>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                            <div class="col-md-12 hidden-xs hidden-sm">
                                <!--img src="../images/eKomi/visage/visage_20.jpg" class="img-circle img-thumbnail img-responsive" alt="Photo client"-->
                                <div style="margin-top:15px">
                                    <span class="glyphicon glyphicon-comment" aria-hidden="true" style="color: #19559e;"></span>
                                    Rapide et simple
                                    Je recommande vivement ce site 								<span style="margin-top:5px; font-style:italic; color:#555;"> - le 18-07-2022 09:04:49</span>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                            <div class="col-md-12 hidden-xs hidden-sm">
                                <!--img src="../images/eKomi/visage/visage_1.jpg" class="img-circle img-thumbnail img-responsive" alt="Photo client"-->
                                <div style="margin-top:15px">
                                    <span class="glyphicon glyphicon-comment" aria-hidden="true" style="color: #19559e;"></span>
                                    Prestation rapide. Très satisfait du service.								<span style="margin-top:5px; font-style:italic; color:#555;"> - le 08-07-2022 07:29:15</span>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                            <div class="col-md-12 hidden-xs hidden-sm">
                                <!--img src="../images/eKomi/visage/visage_15.jpg" class="img-circle img-thumbnail img-responsive" alt="Photo client"-->
                                <div style="margin-top:15px">
                                    <span class="glyphicon glyphicon-comment" aria-hidden="true" style="color: #19559e;"></span>
                                    Sérieux rapide rien à redire au top je recommande								<span style="margin-top:5px; font-style:italic; color:#555;"> - le 27-06-2022 11:21:22</span>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                            <br>
                            <div class="col-md-12" style="margin-top:15px">
                                <em>Source: <a href="/avis.php"><u>Fiche eKomi d'avis clients</u></a></em>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4" style="text-align:center;padding-top:2.5rem">
                        <div style="background-color: #19559e; color: white; padding: 5px 0;">
                            Service disponible également en agence
                        </div>
                        <a href="agence-boulogne-billancourt-92.php">
                            <img src="../../images/commun/agence/agence_mini.jpg" alt="Carte Grise en agence" class="img-responsive" style="width:50%; float:left">
                            <img src="../../images/commun/agence/agence_map.jpg" alt="Carte Grise à Boulogne-Billancourt 92" class="img-responsive" style="width:50%; float:left">
                        </a>
                        <a href="agence-boulogne-billancourt-92.php" class="btn btn-primary" style="background-color: #19559e; border-color: #19559e; width:100%">à Boulogne-Billancourt (92) &gt;&gt;</a>
                    </div>
                </div>


                <div class="avis_ekomi">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-star half" aria-hidden="true"></span>
                    +35000 avis certifiés par eKomi depuis 2011
                </div>
                <div style="clear:both"></div>
            </div>
        </div>

        <div style="clear:both"></div>

        <div id="bloc_avantages" class="content_footer" style="margin: 20px auto;">
            <div class="supertop">
                <!--div class="top" style="background-color:#f3f3f3; color: #004294; height:auto; max-width:1250px; padding-top: 10px; margin-top: 10px;">
        <div class="col-md-3 col-sm-6 col-xs-12" style="text-align:center; padding-bottom:10px">
            <div class="pictogramme pictogramme_prefecture"></div>
            <strong>Habilité Ministère de l'Intérieur</strong><br />
            <span>Habilitation SIV n° 1792</span>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" style="text-align:center; padding-bottom:10px">
            <div class="pictogramme pictogramme_traitement"></div>
            <strong>Traitement en 24h**</strong><br />
            <span>Service express inclus</span>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" style="text-align:center; padding-bottom:10px">
            <div class="pictogramme pictogramme_service_client"></div>
            <strong>Service client dédié</strong><br />
            <span>Un interlocuteur unique à votre service</span>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" style="text-align:center; padding-bottom:10px">
            <div class="pictogramme pictogramme_paiement"></div>
            <strong>Facilité de paiement</strong><br />
            <span>Possibilité de paiement en 4 fois</span>
        </div>
        <div class="clearfix"></div>
        </div-->
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div align="center">
                            <img src="/images/v5/demarche-simplifiee.svg" width="120"><div class="caption" align="center">
                                <h3 style="font-weight: bold;">DÉMARCHE SIMPLIFIÉE</h3>
                                <p>
                                    <strong>Simplification</strong> de la demande de carte grise et <strong>accompagnement</strong> par des agents spécialisés dans vos démarches
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div align="center">
                            <img src="/images/v5/paiement-securise.svg" width="120">
                            <div class="caption" align="center">
                                <h3 style="font-weight: bold;">PAIEMENT SÉCURISÉ</h3>
                                <p>Règlement sécurisé en ligne par <strong>CB</strong>
                                    Possibilité de <a href="/carte-grise-paiement-plusieurs-fois.php"><strong>régler en 3, 4 fois en
                                            CB avec notre partenaire FLOA</strong></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div align="center">
                            <img src="/images/v5/prestataire-habilite.svg" width="120">
                            <div class="caption" align="center">
                                <h3 style="font-weight: bold;">HABILITÉ ET AGRÉÉ</h3>
                                <p>Depuis 2008, notre plateforme est habilitée
                                    par le Ministère de l’Intérieur et agréée par le Trésor Public
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div align="center">
                            <img src="/images/v5/traitement-rapide.svg" width="120">
                            <div class="caption" align="center">
                                <h3 style="font-weight: bold;">RAPIDITÉ DE TRAITEMENT</h3>
                                <p><strong>Demande traitée en 24H</strong>
                                    si le dossier est conforme et validé par un agent après réception des documents nécessaires
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>        </div>
        </div>

        <div id="footer">
            <div class="content_footer">

                <div id="mentions">
                    * Sauf mention spéciale et dès réception de votre dossier complet, hors coût légal du certificat d'immatriculation.
                    Expédition des plaques d'immatriculation dans les 24h suivant la saisie du dossier, et dans la limite des stocks disponibles.
                </div>
                <br><br>

                <div class="col-md-4" style="text-align:center;">
                    <ul class="list-unstyled ListFoot">

                        <li><a href="/formulaires-officiels-cerfa.php" title="Formulaires CERFA Carte Grise">Formulaires carte grise</a></li>

                        <li><a href="/qui-sommes-nous.php" title="Qui sommes nous?">Qui est CarteGriseMinute ?</a></li>
                        <li><a href="/contacter-carte-grise-minute.php" title="Contacter Carte Grise Minute">Contacter CarteGriseMinute</a></li>
                        <li><a href="/marques/" title="Marques et modèles">Marques / Modèles</a></li>
                        <li><a href="/ANTS-carte-grise.php" title="ANTS">Informations ANTS</a></li>
                        <li><a href="/certificat-non-gage.php" title="Non-Gage">Certificat de non gage</a></li>
                        <li><a href="/comprendre-sa-carte-grise.php" title="Lire sa carte grise">Lire sa carte grise</a></li>
                        <li><a href="/vos-demarches-carte-grise-import-etranger.php" title="Immatriculer un véhicule étranger">Immatriculer un véhicule étranger</a></li>
                        <li><a href="/faq.php" title="Foire Aux Questions">F.A.Q., Foire aux questions</a></li>
                    </ul>
                </div>

                <div class="col-md-4" style="text-align:center; border-right:solid 1px #004294; border-left:solid 1px #004294">
                    <img src="/images/commun/logos-mode-paiement/mini_cb_paypal.jpg" width="184" height="29" class="img-responsive" style="margin:auto;" alt="Paiement sécurisé CB, VISA, MASTERCARD et PayPal" loading="lazy">
                    <br>
                    <a href="/carte-grise-paiement-plusieurs-fois.php">Possible de payer en 3 ou 4 fois<br>avec notre partenaire<br><img src="/images/commun/logos-mode-paiement/FLOA4X_CLASSIQUE_133x23.png" width="133px" height="23" class="img-responsive" style="margin: auto;" alt="Paiement sécurisé avec Floa Bank" loading="lazy"></a>
                    <br>
                    <ul class="list-unstyled ListFoot">
                        <li><br><a href="/mentions-legales.php" title="Mentions légales" rel="nofollow noopener" target="_blank">Mentions légales</a></li>
                        <li><a href="/cgv.php" title="Conditions générales de vente" rel="nofollow noopener" target="_blank">Conditions Générales de Vente</a></li>
                        <li><a href="/politique-de-confidentialite.php" title="Politique de confidentialité" rel="nofollow noopener" target="_blank">Politique de confidentialité</a></li>
                        <li><a href="/formulaire-retractation.php" rel="nofollow" title="Formulaire de retractation" target="_blank">Formulaire de rétractation</a></li>
                    </ul>
                </div>

                <div class="col-md-4" style="text-align:center">
                    MBC / CarteGriseMinute.fr<br>
                    Habilitation 1792 du Ministère de l'Intérieur<br>
                    Agrément 13673 du Trésor Public
                    <br><br>
                    © 2009-2023
                    <br><br>

                    <div>
                        <a href="http://www.fnpcgl.fr/" title="Fédération Nationale des Professionnels de la carte grise en ligne" rel="nofollow noopener" target="_blank">
                            <img src="/images/commun/pictogrammes/fpcgl.png" alt="logo FNPCGL" width="75px" height="85px" class="img-responsive" loading="lazy" style="position:relative; float: right; margin-right: 15%">
                        </a>

                        <img src="/images/franceconnect/fc-avatar.png" alt="FranceConnect" width="75px" height="85px" class="img-responsive" loading="lazy" style="position:relative; float: left; margin-left: 15%">
                    </div>
                </div>

                <div style="clear:both;"></div>
            </div>
        </div>


        <script type="application/ld+json">
    {
      "@context": "http://schema.org/",
      "@type": "Product",
      "name": "Carte Grise en ligne",
      "image": "https://www.cartegriseminute.fr/images/carte-grise-minute.png",
      "description": "CarteGriseMinute.fr se charge pour vous de votre démarche de carte grise en ligne.",
      "brand": {
        "@type": "Thing",
        "name": "CarteGriseMinute.fr"
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.1",
        "reviewCount": "77"
      },
      "offers": {
        "@type": "Offer",
        "priceCurrency": "EUR",
        "price": "29.90",
        "availability": "http://schema.org/InStock"
      }
    }
    </script>
        <script type="application/ld+json">
        { "@context" : "http://schema.org",
            "@type" : "Organization",
            "url" : "https://www.cartegriseminute.fr",
            "legalName" : "CarteGriseMinute.fr",
            "contactPoint" : [
                { "@type" : "ContactPoint",
                    "telephone" : "+33899370037",
                    "contactType" : "sales service"
                } ]
        }
    </script>

        <script type="text/javascript">
            window.axeptioSettings = {
                clientId: "606ec2ea6ac944450f3161f3",
                cookiesVersion: "cgm-base",
            };
            (function(d, s) {
                var t = d.getElementsByTagName(s)[0], e = d.createElement(s);
                e.async = true; e.src = "//static.axept.io/sdk.js";
                t.parentNode.insertBefore(e, t);
            })(document, "script");
        </script>



        <!--googleoff: index--><div class="axeptio_mount" id="axeptio_overlay" data-project-id="606ec2ea6ac944450f3161f3" data-nosnippet=""><div class="WebsiteOverlay__WebsiteOverlayStyle-sc-1tlh7za-0 bqzerq ax-website-overlay"><button id="axeptio_main_button" aria-label="Manage your preferences about cookies" title="Manage your preferences about cookies" class="AxeptioButton__AxeptioButtonStyle-sc-1h6hacv-0 hMxmxV"><span class="AxeptioIcon__AxeptioIconStyle-sc-acb40e-0 cwHlYw"><span class="Icon__IconStyleContainer-sc-1jpid70-0 bEBISY"><span class="Icon__IconStyle-sc-1jpid70-1 bfWHZL svgr"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M21.662 2.821C18.866.025 11.663-.252 5.124 5.422-.987 10.725-.89 17.107 3.87 20.613c4.443 3.272 10.542 3.802 15.191-1.256 5.648-6.144 5.399-13.74 2.601-16.536z"></path><path fill="#FFF" d="M8.104 14.644a.567.567 0 01-.804 0h-.001l-2.53-2.529a.57.57 0 01.805-.807l2.128 2.127 6.186-6.185a.57.57 0 01.805.805l-6.589 6.589zm4.895-1.92a.546.546 0 01-.387-.93l4.047-4.047a.549.549 0 01.774 0 .549.549 0 010 .774l-4.046 4.047a.545.545 0 01-.388.156zm4.964 1.236l-1.593 1.591a.544.544 0 01-.773 0 .549.549 0 010-.774l1.594-1.594a.547.547 0 11.79.755l-.016.017-.002.005zm0-2.985l-3.085 3.084a.549.549 0 01-.774-.775l3.087-3.087a.549.549 0 01.774.775l-.002.003z"></path></svg></span></span></span></button></div></div><!--googleon: index--><potions-propulse root="" potions-data="redirect_url"></potions-propulse></body></html>

    </div>
</div>

<script>



    $( document ).ready(function() {

        $( "#editor" ).load("/backoffice/wysiwyg/editor_example", function() {

            inlineEditor(document.querySelector( '#editor' ))

        });
    });

    function inlineEditor(container)
    {
        InlineEditor
            .create( container )
            .catch( error => {
                console.error( error );
            } );
    }

</script>
</body>
</html>
