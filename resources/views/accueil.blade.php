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

                                <div class="form-group col-sm-6" style="margin: 20px;">
                                    <label>Type inscription <span style="color: red;">*</span></label>
                                   <div class="styled-select">
                                        <select class="required" name="country" onchange="displayform(this.value)">
                                            <option value="" selected></option>
                                            <option value="1">Association / Structure</option>
                                            <option value="2">Particulier</option>
                                        </select>
                                    </div>
                                </div>

                                <form  id="particulier" method="POST" style="display: block;">
                                    
                                    <div id="middle-wizard">
                                            <div class="row add_bottom_30">

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                         <label>Nom <span style="color: red;">*</span></label>
                                                        <input type="text" name="nom" class="form-control" placeholder="Nom">
                                                    </div>
                                                    <div class="form-group">
                                                         <label>Prénoms <span style="color: red;">*</span></label>
                                                        <input type="text" name="prenoms" class="required form-control" placeholder="Prénoms">
                                                    </div>
                                                    <div class="form-group">
                                                         <label>Sexe <span style="color: red;">*</span></label>
                                                       <div class="styled-select">
                                                            <select class="required" name="country">
                                                                <option value="" selected></option>
                                                                <option value="1">Masculin</option>
                                                                <option value="2">Feminin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                         <label>Date de naissance <span style="color: red;">*</span></label>
                                                        <input type="date" name="datedenaissance" class="required form-control" placeholder="Date de naissance">
                                                    </div>
                                                    <div class="form-group">
                                                         <label>Lieu de Naissance <span style="color: red;">*</span></label>
                                                        <input type="text" name="lieudenaissance" class="required form-control" placeholder="Lieu de naissance">
                                                    </div>
                                                    <div class="form-group">
                                                         <label>Nationalité <span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="country" onchange="precisenationalite(this.value)">
                                                                <option value="" selected></option>
                                                                <option value="1">Ivoirienne</option>
                                                                <option value="2">Non ivoirienne</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="display:none;" id="precisenationalite">
                                                         <label>Précisez votre nationalité <span style="color: red;">*</span></label>
                                                        <input type="text" name="" class="required form-control" placeholder="Précisez votre nationalité">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                 <div class="col-sm-6">
                                                    <div class="form-group">
                                                         <label>Téléphone personnel 1 <span style="color: red;">*</span></label>
                                                        <input type="text" name="telephone" class="required form-control" placeholder="Téléphone personnel 1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Téléphone personnel 2 <span style="color: red;">*</span></label>
                                                         <input type="text" name="telephone2" class="required form-control" placeholder="Téléphone personnel 2">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Type de pièce <span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="typepiece" onchange="precisepiece(this.value)">
                                                                <option value="" selected></option>
                                                                <option value="1">CNI</option>
                                                                <option value="2">Attestation d'identité</option>
                                                                <option value="3">Passeport</option>
                                                                <option value="4">Extrait de Naissance</option>
                                                                <option value="5">Autre</option>
                                                                <option value="6">Aucune</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group" style="display:none;" id="precisepiece">
                                                         <label>Précisez votre pièce <span style="color: red;">*</span></label>
                                                        <input type="text" name="" class="required form-control" placeholder="Précisez votre pièce">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Numéro de la pièce <span style="color: red;">*</span></label>
                                                        <input type="text" name="numeropiece" class="required form-control" placeholder="Numéro de la pièce">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Lieu de résidence<span style="color: red;">*</span></label>
                                                         <input type="text" name="residence" class="required form-control" placeholder="Lieu de résidence">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Situation matrimoniale <span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected></option>
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
                                                        <label>District<span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected></option>
                                                                <option value=""></option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Région<span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected></option>
                                                                <option value=""></option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Département<span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected></option>
                                                                <option value=""></option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Sous-Préfecture<span style="color: red;">*</span></label>
                                                         <input type="text" name="sousprefecture" class="required form-control" placeholder="Sous-Préfecture">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Situation de handicap<span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="" onchange="precisehandicap(this.value)">
                                                                <option value=""></option>
                                                                <option value="1">Handicap</option>
                                                                <option value="2">Non handicap</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="display:none;" id="precisehandicap">
                                                         <label>Précisez votre handicap <span style="color: red;">*</span></label>
                                                        <input type="text" name="" class="required form-control" placeholder="Précisez votre handicap">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Scolarisé<span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="" onchange="precisescolarite(this.value)">
                                                                <option value="" selected></option>
                                                                <option value="1">Oui</option>
                                                                <option value="2">Non</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="display:none;" id="preciseniveau">
                                                        <label>Niveau scolaire<span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="">
                                                                <option value="" selected></option>
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
                                                    <div class="form-group" style="display:none;" id="precisediplome">
                                                        <label>Diplôme(s) obtenu(s)<span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="">
                                                                <option value="" selected></option>
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
                                                        <label>Situation professionnelle actuelle<span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale" onchange="precisesituationprof(this.value)">
                                                                <option value=""></option>
                                                                <option value="1">Travailleur</option>
                                                                <option value="2">Sans emploi</option>
                                                                <option value="3">Etudiant</option>
                                                                <option value="4">Elève</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="display:none;" id="precisesituationprof">
                                                         <label>Précisez votre emploi<span style="color: red;">*</span></label>
                                                        <input type="text" name="" class="required form-control" placeholder="Précisez votre emploi">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Êtes-vous membre d'une association?<span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="" onchange="preciseassociation(this.value)">
                                                                <option value=""></option>
                                                                <option value="1">Oui</option>
                                                                <option value="2">Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="display:none;" id="preciseassociation">
                                                         <label>Laquelle des associations ?<span style="color: red;">*</span></label>
                                                        <input type="text" name="" class="required form-control" placeholder="Laquelle des associations ?">
                                                    </div>
                                                    <div class="form-group" style="display:none;" id="precisedomaine">
                                                         <label>Dans quel domaine intervenez-vous?<span style="color: red;">*</span></label>
                                                        <input type="text" name="" class="required form-control" placeholder="Dans quel domaine intervenez-vous?">
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
                                                        <label>Nom<span style="color: red;">*</span></label>
                                                        <input type="text" name="nom" class="form-control" placeholder="Nom">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>N° d’enregistrement Pour les ONG et associations<span style="color: red;">*</span></label>
                                                        <input type="text" name="prenoms" class="required form-control" placeholder="N° d’enregistrement Pour les ONG et associations">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>N° du texte de création Pour les structures et parapubliques<span style="color: red;">*</span></label>
                                                        <input type="text" name="prenoms" class="required form-control" placeholder="N° du texte de création Pour les structures et parapubliques">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Statut juridique<span style="color: red;">*</span></label>
                                                        <input type="text" name="statut_juridique" class="required form-control" placeholder="Statut juridique">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Région<span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected></option>
                                                                <option value=""></option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Adresse postale<span style="color: red;">*</span></label>
                                                        <input type="text" name="adresse_postal" class="required form-control" placeholder="Adresse postale">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                 <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Département<span style="color: red;">*</span></label>
                                                        <div class="styled-select">
                                                            <select class="required" name="situationmatrimoniale">
                                                                <option value="" selected></option>
                                                                <option value=""></option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email<span style="color: red;">*</span></label>
                                                        <input type="email" name="email" class="required form-control" placeholder="Email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Site web<span style="color: red;">*</span></label>
                                                         <input type="text" name="siteweb" class="required form-control" placeholder="Site web">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Téléphone du répondant<span style="color: red;">*</span></label>
                                                         <input type="text" name="" class="required form-control" placeholder="Téléphone du répondant">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email du répondant<span style="color: red;">*</span></label>
                                                         <input type="text" name="" class="required form-control" placeholder="Email du répondant">
                                                    </div>
                                                   
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Téléphone<span style="color: red;">*</span></label>
                                                        <input type="text" name="telephone" class="required form-control" placeholder="Téléphone">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Fax<span style="color: red;">*</span></label>
                                                         <input type="text" name="fax" class="required form-control" placeholder="Fax">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nom du répondant<span style="color: red;">*</span></label>
                                                         <input type="text" name="nom_repondant" class="required form-control" placeholder="Nom du répondant">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Prenoms du répondant<span style="color: red;">*</span></label>
                                                         <input type="text" name="prenom_repondant" class="required form-control" placeholder="Prenoms du répondant">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Fonction du répondant dans l’organisation<span style="color: red;">*</span></label>
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
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Hosting plan" class="icheck required" style="position: absolute; opacity: 0;" onchange="precisedomaineintervention(this.value)"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Autre : <span style="display:none" id="precisedomaineintervention"><input type="text" name="" class="required form-control" placeholder="Autre domaine"></span>
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
                                                                <div class="icheckbox_square-yellow checked" style="position: relative;"><input name="question_2[]" type="checkbox" value="Hosting plan" class="icheck required" style="position: absolute; opacity: 0;" onchange="precisepopulationcible(this.value)"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>Autre : <span style="display:none" id="precisepopulationcible"> <input type="text"  name="" class="required form-control" placeholder="Autre population"></span>
                                                            </label>
                                                        </div>
                                                        
                                                    </div>
                                                </div>    
                                                </div>
                                                </div>
                                                    
                                                </div><!-- /col-sm-6 -->

                                                <div class="row add_bottom_30">

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Effectif du Personnel<span style="color: red;">*</span></label>
                                                         <input type="text" name="prenom_repondant" class="required form-control" placeholder="Effectif du Personnel">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Effectif Homme<span style="color: red;">*</span></label>
                                                         <input type="text" name="" class="required form-control" placeholder="Effectif Homme">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Effectif Femme<span style="color: red;">*</span></label>
                                                         <input type="text" name="" class="required form-control" placeholder="Effectif Femme">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Effectif Salariés<span style="color: red;">*</span></label>
                                                         <input type="text" name="prenom_repondant" class="required form-control" placeholder="Effectif Salariés">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Effectif Contractuels<span style="color: red;">*</span></label>
                                                         <input type="text" name="" class="required form-control" placeholder="Effectif Contractuels">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Effectif Bénévoles<span style="color: red;">*</span></label>
                                                         <input type="text" name="" class="required form-control" placeholder="Effectif Bénévoles">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                 <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Montant du budget de l’année en cours<span style="color: red;">*</span></label>
                                                         <input type="text" name="prenom_repondant" class="required form-control" placeholder="Montant du budget de l’année en cours">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Année 2019<span style="color: red;">*</span></label>
                                                         <input type="text" name="" class="required form-control" placeholder="Année 2019">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Année 2018<span style="color: red;">*</span></label>
                                                         <input type="text" name="" class="required form-control" placeholder="Année 2018">
                                                    </div>
                                                </div><!-- /col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Année 2017<span style="color: red;">*</span></label>
                                                         <input type="text" name="" class="required form-control" placeholder="Année 2017">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Désirez-vous nous communiquer d’autres informations ?<span style="color: red;">*</span></label>
                                                         <div class="styled-select">
                                                            <select class="required" name="" onchange="preciseinformation(this.value)">
                                                                <option value="" selected></option>
                                                                <option value="1">Oui</option>
                                                                <option value="2">Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="display:none;" id="preciseinformation">
                                                         <label>Quelles informations ?</label>
                                                        <input type="text" name="" class="required form-control" placeholder="Quelles informations ?">
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

      function precisenationalite(id){
         
      if (id == 2) {$("#precisenationalite").css("display","block");}else{$("#precisenationalite").css("display","none");}

      } 

      function precisepiece(id){
         
      if (id == 5) {$("#precisepiece").css("display","block");}else{$("#precisepiece").css("display","none");}

      } 
      function precisehandicap(id){
         
      if (id == 1) {$("#precisehandicap").css("display","block");}else{$("#precisehandicap").css("display","none");}

      } 
      function precisescolarite(id){
         
      if (id == 1) {
                    $("#preciseniveau").css("display","block");
                    $("#precisediplome").css("display","block");
                  }else{
                    $("#preciseniveau").css("display","none");
                    $("#precisediplome").css("display","none");
                }

      }
      function preciseassociation(id){
         
      if (id == 1) {
                    $("#preciseassociation").css("display","block");
                    $("#precisedomaine").css("display","block");
                  }else{
                    $("#preciseassociation").css("display","none");
                    $("#precisedomaine").css("display","none");
                }

      } 
    function precisesituationprof(id){
         
      if (id == 1) {$("#precisesituationprof").css("display","block");}else{$("#precisesituationprof").css("display","none");}

      } 

      function preciseinformation(id){
         
      if (id == 1) {$("#preciseinformation").css("display","block");}else{$("#preciseinformation").css("display","none");}

      }

      function precisedomaineintervention(id){
         alert(id)
      if (id == 1) {$("#preciseinformation").css("display","block");}else{$("#preciseinformation").css("display","none");}

      }  
</script>

@endsection
