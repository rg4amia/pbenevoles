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

                                <form name="example-1" id="wrapped" method="POST">
                                    <input id="website" name="website" type="text" value=""><!-- Leave for security protection, read docs for details -->
                                    <div id="middle-wizard">
                                        <div class="step">
                                            <h3 class="main_question"><strong></strong></h3>

                                            <div class="form-group radio_questions">
                                                <label>Association / Structure
                                                    <input name="question_1" type="radio" value="My budget is under $500" class="icheck required">
                                                </label>
                                            </div>
                                            <div class="form-group radio_questions">
                                                <label>Particulier
                                                    <input name="question_1" type="radio" value="My budget is between $500 and $1000" class="icheck required">
                                                </label>
                                            </div>
                                            
                                        </div><!-- /step 1-->

                                        <div class="step">
                                            <h3 class="main_question"><strong>2/4</strong>What your poject need?</h3>

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
                                            
                                        </div><!-- /step 2-->

                                    </div><!-- /middle-wizard -->
                                    <div id="bottom-wizard">
                                        <button type="button" name="backward" class="backward">Backward </button>
                                        <button type="button" name="forward" class="forward">Forward</button>
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
