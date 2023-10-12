@extends('layouts.main')
@section('content')
    <div class="wrapper_in">
        <div class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab_1">
                    <div class="subheader" id="quote"></div>
                    <div class="row">
                        <aside class="col-xl-3 col-lg-4">
                            <h2>Request a Quote and Compare prices!</h2>
                            <p class="lead">An mei sadipscing dissentiet, eos ea partem viderer facilisi.</p>
                            <ul class="list_ok">
                                <li>Delicata persecuti ei nec, et his minim omnium, aperiam placerat ea vis.</li>
                                <li>Suavitate vituperatoribus pro ad, cum in quis propriae abhorreant.</li>
                                <li>Aperiri deterruisset ei mea, sed cu laudem intellegat, eu mutat iuvaret voluptatum mei.</li>
                            </ul>
                        </aside><!-- /aside -->

                        <div class="col-xl-9 col-lg-8">
                            <div id="wizard_container">
                                <div id="top-wizard">
                                    <h3 class="main_question"><strong>FORMULAIRE D’INSCRIPTION AU PROGRAMME BENEVOLE CAN 2023</strong></h3>
                                    <!-- <div id="progressbar"></div> -->
                                </div><!-- /top-wizard-->

                                <div class="form-group">
                                   <div class="styled-select">
                                        <select class="required" name="country" onchange="displayform(this.value)">
                                            <option value="" selected>Type inscription</option>
                                            <option value="1">Association / Structure</option>
                                            <option value="2">Particulier</option>
                                        </select>
                                    </div>
                                </div>

                                <form  id="particulier" method="POST" style="display: block;">
                                    <input id="website" name="website" type="text" value=""><!-- Leave for security protection, read docs for details -->
                                    <div id="middle-wizard">

                                            <div class="row add_bottom_30">

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" name="nom" class="form-control" placeholder="Nom">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="prenoms" class="required form-control" placeholder="Prénoms">
                                                    </div>
                                                    <div class="form-group">
                                                       <div class="styled-select">
                                                            <select class="required" name="country">
                                                                <option value="" selected>Sexe</option>
                                                                <option value="1">Masculin</option>
                                                                <option value="2">Feminin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="date" name="datedenaissance" class="required form-control" placeholder="Date de naissance">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="lieudenaissance" class="required form-control" placeholder="Lieu de naissance">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="country">
                                                                <option value="" selected>Nationalité</option>
                                                                <option value="1">Ivoirienne</option>
                                                                <option value="2">Non ivoirienne</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                 <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" name="telephone" class="required form-control" placeholder="Téléphone personnel 1">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="telephone2" class="required form-control" placeholder="Téléphone personnel 2">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="typepiece">
                                                                <option value="" selected>Type de pièce</option>
                                                                <option value="1">CNI</option>
                                                                <option value="2">Attestation d'identité</option>
                                                                <option value="3">Passeport</option>
                                                                <option value="4">Extrait de Naissance</option>
                                                                <option value="5">Autre</option>
                                                                <option value="6">Aucune</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" name="numeropiece" class="required form-control" placeholder="Numéro de la pièce">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="residence" class="required form-control" placeholder="Lieu de résidence">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected>Situation matrimoniale</option>
                                                                <option value="1">Célibataire</option>
                                                                <option value="2">En concubinage</option>
                                                                <option value="3">Marié(e)</option>
                                                                <option value="4">Divorcé</option>
                                                                <option value="5">Veuf(ve)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected>District</option>
                                                                <option value=""></option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected>Région</option>
                                                                <option value=""></option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected>Département</option>
                                                                <option value=""></option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="sousprefecture" class="required form-control" placeholder="Sous-Préfecture">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected>Situation de handicap</option>
                                                                <option value="">Handicap</option>
                                                                <option value="">Non handicap</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected>Scolarisé</option>
                                                                <option value="">Oui</option>
                                                                <option value="">Non</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected>Niveau scolaire</option>
                                                                <option value="1">Cours primaire (CP1 au CP2)</option>
                                                                <option value="2">Cours élémentaire (CE1 au CE2)</option>
                                                                <option value="3">Cours moyen (CM1 au CM2)</option>
                                                                <option value="4">Secondaire général 1er cycle (6ieme à la 3ieme)</option>
                                                                <option value="5">Secondaire professionnel 1er cycle</option>
                                                                <option value="6">Secondaire général 2nd cycle (Seconde à la terminale)</option>
                                                                <option value="7">Secondaire professionnel 2nd cycle</option>
                                                                <option value="8">Université / Ecole supérieure</option>
                                                                <option value="9">Ecole coranique</option>
                                                                <option value="10">Autre</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected>Diplôme(s) obtenu(s)</option>
                                                                <option value="">Aucun</option>
                                                                <option value="">CEPE</option>
                                                                <option value="">CAP/CQP</option>
                                                                <option value="">BEPC</option>
                                                                <option value="">BP/BEP</option>
                                                                <option value="">BAC</option>
                                                                <option value="">BTS</option>
                                                                <option value="">Licence</option>
                                                                <option value="">Master</option>
                                                                <option value="">Autre (à préciser)</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected>Situation professionnelle actuelle</option>
                                                                <option value="">Travailleur</option>
                                                                <option value="">Sans emploi</option>
                                                                <option value="">Etudiant</option>
                                                                <option value="">Elève</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected>Êtes-vous membre d'une association?</option>
                                                                <option value="1">Oui</option>
                                                                <option value="2">Non</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div><!-- /col-sm-6 -->

                                            </div><!-- /row-->
                                            
                            
                                    </div><!-- /middle-wizard -->
                                    <div id="bottom-wizard">
                                        <button type="submit" name="process" class="submit">Submit</button>
                                    </div><!-- /bottom-wizard -->
                                </form>


                                <form id="structure" method="POST" style="display: none;">
                                    <input id="website" name="website" type="text" value=""><!-- Leave for security protection, read docs for details -->
                                    <div id="middle-wizard">

                                            <div class="row add_bottom_30">

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" name="nom" class="form-control" placeholder="Nom">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="prenoms" class="required form-control" placeholder="N° d’enregistrement Pour les ONG et associations">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="prenoms" class="required form-control" placeholder="N° du texte de création Pour les structures et parapubliques">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" name="statut_juridique" class="required form-control" placeholder="Statut juridique">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected>Région</option>
                                                                <option value=""></option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="adresse_postal" class="required form-control" placeholder="Adresse postale">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                 <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected>Département</option>
                                                                <option value=""></option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="required form-control" placeholder="Email">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="siteweb" class="required form-control" placeholder="Site web">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="" class="required form-control" placeholder="Téléphone du répondant">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="" class="required form-control" placeholder="Email du répondant">
                                                    </div>
                                                   
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" name="telephone" class="required form-control" placeholder="Téléphone">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="fax" class="required form-control" placeholder="Fax">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="nom_repondant" class="required form-control" placeholder="Nom du répondant">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="prenom_repondant" class="required form-control" placeholder="Prenoms du répondant">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="" class="required form-control" placeholder="Fonction du répondant dans l’organisation">
                                                    </div>
                                                    
                                                </div><!-- /col-sm-6 -->

                                
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <h4>Domaine(s) d’intervention (plusieurs choix possibles) </h4>

                                                        <div class="row add_bottom_30">
                                                   
                                                    <div class="col-sm-6">
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Custom interface and layout" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Education / Formation
                                                            </label>
                                                        </div>
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Web site design" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Santé communautaire
                                                            </label>
                                                        </div>
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Seo optimization" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Assainissement/Environnement
                                                            </label>
                                                        </div>
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Hosting plan" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Promotion des droits humains
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6">
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="CMS integrations (Wordpress)" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Agriculture
                                                            </label>
                                                        </div>
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Domain registration" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Appui aux organisations de base
                                                            </label>
                                                        </div>
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Hosting plan" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Développement communautaire
                                                            </label>
                                                        </div>

                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Hosting plan" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Autre :
                                                            </label>
                                                        </div>
                                                        
                                                    </div>
                                                </div>    
                                                </div>
                                                </div>
                                                
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <h4>Population cible (plusieurs choix possibles) </h4>

                                                        <div class="row add_bottom_30">
                                                   
                                                    <div class="col-sm-6">
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Custom interface and layout" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Population générale
                                                            </label>
                                                        </div>
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Web site design" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Hommes
                                                            </label>
                                                        </div>
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Seo optimization" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Femmes
                                                            </label>
                                                        </div>
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Hosting plan" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Jeunes
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6">
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="CMS integrations (Wordpress)" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Enfants
                                                            </label>
                                                        </div>
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Domain registration" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Personnes âgées
                                                            </label>
                                                        </div>
                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Hosting plan" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Personnes vivant avec un handicap
                                                            </label>
                                                        </div>

                                                        <div class="form-group checkbox_questions">
                                                            <label class="">
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Hosting plan" class="icheck required" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Autre :
                                                            </label>
                                                        </div>
                                                        
                                                    </div>
                                                </div>    
                                                </div>
                                                </div>
                                                    
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                         <input type="text" name="prenom_repondant" class="required form-control" placeholder="Effectif du Personnel">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="" class="required form-control" placeholder="Effectif Homme">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="" class="required form-control" placeholder=" Effectif Femme">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                         <input type="text" name="prenom_repondant" class="required form-control" placeholder="Effectif Salariés">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="" class="required form-control" placeholder="Effectif Contractuels">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="" class="required form-control" placeholder="Effectif Bénévoles">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                 <div class="col-sm-6">
                                                    <div class="form-group">
                                                         <input type="text" name="prenom_repondant" class="required form-control" placeholder="Montant du budget de l’année en cours">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="" class="required form-control" placeholder="Année 2019">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="" class="required form-control" placeholder="Année 2018">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    
                                                    <div class="form-group">
                                                         <input type="text" name="" class="required form-control" placeholder="Année 2017">
                                                    </div>
                                                    <div class="form-group">
                                                         <input type="text" name="prenom_repondant" class="required form-control" placeholder=" Désirez-vous nous communiquer d’autres informations ? Si oui, les quelles ?">
                                                    </div>
                                                </div><!-- /col-sm-6 -->


                                            </div><!-- /row-->
                                            
                                       

                                    </div><!-- /middle-wizard -->
                                    <div id="bottom-wizard">
                                        <button type="submit" name="process" class="submit">Submit</button>
                                    </div><!-- /bottom-wizard -->
                                </form>
                            </div><!-- /Wizard container -->

                        </div><!-- /col -->
                    </div><!-- /row -->
                </div><!-- /TAB 1:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->

                
            </div><!-- /tab content -->
        </div><!-- /container-fluid -->
    </div>
@endsection
@section('js')

<script type="text/javascript">
    function displayform(form_id){
         
      if (form_id == 2) {
            $("#particulier").css("display","block");
            $("#structure").css("display","none");
        
                         }else{
                            $("#particulier").css("display","none");
                            $("#structure").css("display","block");

                        }

      } 
</script>

@endsection
