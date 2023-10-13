@extends('layouts.main')
@section('content')
    <div class="wrapper_in">
        <div class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab_1">
                    <div class="subheader" id="quote"></div>
                    <div class="row">
                        <aside class="col-xl-3 col-lg-4">
                            <br>
                            <h5 style="color:#ff8019;">QU’EST CE QUE LE PROGRAMME BÉNÉVOLES ?</h5>
                            <ul class="list_ok">
                                <li style="font-weight: 400; text-align: justify">Dans le cadre de l’organisation de la
                                    CAN 2023, et conformément à l’axe 2 du Programme Jeunesse du Gouvernement (PJ-GOUV
                                    2023-2025) qui vise le renforcement de l’engagement citoyen et l’éthique sociale de
                                    la jeunesse, l’Etat a décidé de la mobilisation de 30 000 jeunes dont 10 000
                                    volontaires par le COCAN et 20 000 bénévoles confiée au Ministère de la Promotion de
                                    la Jeunesse, de l’Insertion Professionnelle et du Service Civique.
                                </li>
                            </ul>

                            <h5 style="color:#ff8019;">QUI PEUT DEVENIR BÉNÉVOLE ? </h5>
                            <ul class="list_ok">
                                <li style="font-weight: 400">
                                    Peut devenir bénévole toute personne âgée d’au moins 16 ans, libre pendant les
                                    journées de la CAN.
                                </li>
                            </ul>

                            <h5 style="color:#ff8019;">QUELLES SONT LES MISSIONS DES BÉNÉVOLES ?</h5>
                            <p> Les 20 000 bénévoles recrutés auront pour missions :</p>
                            <ul class="list_ok">
                                <li style="font-weight: 400">
                                    D’animer les stades et les villages CAN ;
                                </li>
                                <li style="font-weight: 400">
                                    De soutenir les équipes non ivoiriennes en compétition ;
                                </li>
                                <li style="font-weight: 400">
                                    D’animer les espaces de regroupements de supporters ;
                                </li>
                                <li style="font-weight: 400">
                                    D’être des guides touristiques, animateurs culturels ;
                                </li>
                                <li style="font-weight: 400">
                                    De conduire des missions d’assainissement et de salubrité des villes ;
                                </li>
                                <li style="font-weight: 400">
                                    Sensibiliser sur les sujets d’intérêt.
                                </li>
                            </ul>

                            <h5 style="color:#ff8019;">QUELS SONT LES SITES OÙ INTERVIENNENT LES BÉNÉVOLES ?</h5>
                            <ul class="list_ok">
                                <li style="font-weight: 400; text-align: justify">
                                    Les bénévoles interviendront dans les stades, les villages CAN et divers lieux de
                                    regroupement des supporters.
                                </li>
                            </ul>

                            <h5 style="color:#ff8019;">COMMENT S’INSCRIRE AU PROGRAMME BÉNÉVOLES ?</h5>
                            <ul class="list_ok">
                                <li style="font-weight: 400; text-align: justify">
                                    Pour devenir bénévole c’est simple, il suffit de se rendre sur le site
                                    benevoles-can.oscn.ci et renseigner le formulaire de candidature.
                                </li>
                            </ul>

                        </aside><!-- /aside -->

                        <div class="col-xl-9 col-lg-8">
                            <div id="wizard_container">
                                <div id="top-wizard">
                                    <h3 class="main_question"><strong>FORMULAIRE D’INSCRIPTION AU PROGRAMME BENEVOLE CAN
                                            2023</strong></h3>
                                    <!-- <div id="progressbar"></div> -->
                                </div><!-- /top-wizard-->

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li style="font-size: 14px;">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div>
                                    <div>
                                        @forelse(['danger', 'warning', 'success', 'info'] as $msg)
                                            @if (Session::has($msg) )
                                                <div class="demo-spacing-0">
                                                    <div class="alert alert-{{$msg}} mt-1 alert-validation-msg"
                                                         role="alert">
                                                        <div class="alert-body">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                 height="14" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="feather feather-info mr-50 align-middle">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                                            </svg>
                                                            <span>{{ Session::get($msg) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @endforeach
                                    </div>
                                </div>

                                <div class="form-group col-sm-6" style="margin: 20px;">
                                    <label>Type inscription <span style="color: red;">*</span></label>
                                    <div class="styled-select">
                                        <select class="required" name="type_inscription" id="type_inscription"
                                                onchange="displayform(this.value)"
                                                required="required">
                                            <option value="">Choisir Type Inscription</option>
                                            <option value="1" {{ old('type_inscription') == '1' ? 'selected' : '' }}>Association / Structure</option>
                                            <option value="2" {{ old('type_inscription') == '2' ? 'selected' : '' }}>Particulier</option>
                                        </select>
                                    </div>
                                </div>

                                <form id="particulier" method="POST" action="{{ route('store') }}" style="display: none;">
                                    @csrf()
                                    <div id="middle-wizard">
                                        <div class="row add_bottom_30">

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Photo <span style="color: red;">*</span></label>
                                                    <input type="file" name="photoidentite"
                                                           class="form-control is-invalid" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nom <span style="color: red;">*</span></label>
                                                    <input type="text" name="nom"
                                                           class="form-control @error('nom') is-invalid @enderror"
                                                           placeholder="Nom" value="{{ old('nom') }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Prénoms <span style="color: red;">*</span></label>
                                                    <input type="text" name="prenoms" value="{{ old('prenoms') }}"
                                                           class="required form-control @error('prenoms') is-invalid @enderror"
                                                           placeholder="Prénoms" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sexe <span style="color: red;">*</span></label>
                                                    <div class="styled-select" required>
                                                        {{--<select class="required" name="country">
                                                            <option value="" selected></option>
                                                            <option value="1">Masculin</option>
                                                            <option value="2">Feminin</option>
                                                        </select>--}}
                                                        {{ html()->select('sexe_id', $sexes, old('sexe_id'))->class('required')->placeholder('Selectionner Sexe') }}
                                                    </div>
                                                </div>
                                            </div><!-- /col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Date de naissance <span style="color: red;">*</span></label>
                                                    <input type="date" name="datenaissance"
                                                           class="required form-control @error('datenaissance') is-invalid @enderror"
                                                           placeholder="Date de naissance"
                                                           value="{{ old('datenaissance') }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Lieu de Naissance <span style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        {{ html()->select('lieu_naissance_id',$communes, old('lieu_naissance_id'))->class('required')->placeholder('Selection Lieu naissance')->required(true) }}
                                                    </div>
                                                    {{-- <input type="text" name="lieudenaissance"
                                                           class="required form-control"
                                                           placeholder="Lieu de naissance">--}}
                                                </div>
                                                <div class="form-group">
                                                    <label>Nationalité <span style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        {{ html()->select('nationalite_id', $nationnalites, old('nationalite_id'))->class('required')->placeholder('Selectionner Nationalité')->id('nationalite_id') }}
                                                        {{--<select class="required" name="country" onchange="precisenationalite(this.value)">
                                                            <option value="" selected></option>
                                                            <option value="1">Ivoirienne</option>
                                                            <option value="2">Non ivoirienne</option>
                                                        </select>--}}
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display:none;" id="precisenationalite">
                                                    <label>Précisez votre nationalité <span style="color: red;">*</span></label>
                                                    <input type="text" name="precisenationalite"
                                                           class="required form-control @error('precisenationalite') is-invalid @enderror"
                                                           placeholder="Précisez votre nationalité"
                                                           value="{{ old('precisenationalite') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Téléphone personnel 1 <span
                                                            style="color: red;">*</span></label>
                                                    <input type="text" name="telephone" value="{{ old('telephone') }}"
                                                           class="required form-control @error('telephone') is-invalid @enderror"
                                                           placeholder="Téléphone personnel 1">
                                                </div>
                                            </div><!-- /col-sm-6 -->

                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label>Téléphone personnel 2 </label>
                                                    <input type="text" name="telephone_autre"
                                                           value="{{ old('telephone_autre') }}" class="form-control"
                                                           placeholder="Téléphone personnel 2">
                                                </div>
                                                <div class="form-group">
                                                    <label>Type de pièce <span style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        {{--<select class="required" name="typepiece" onchange="precisepiece(this.value)">
                                                            <option value="" selected></option>
                                                            <option value="1">CNI</option>
                                                            <option value="2">Attestation d'identité</option>
                                                            <option value="3">Passeport</option>
                                                            <option value="4">Extrait de Naissance</option>
                                                            <option value="5">Autre</option>
                                                            <option value="6">Aucune</option>
                                                        </select>--}}
                                                        {{ html()->select('type_piece_id', $typepieces, old('type_piece_id'))->class('required')->placeholder('Selectionner Type pièces')->id('type_piece_id') }}
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>District<span style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        {{ html()->select('district_id', $districts, old('district_id'))->class('required')->placeholder('Selectionner districs')->id('district_id') }}
                                                    </div>
                                                </div>

                                                <div class="form-group" style="display:none;" id="precisepiece">
                                                    <label>Précisez votre pièce <span
                                                            style="color: red;">*</span></label>
                                                    <input type="text" name="autre_typepiece"
                                                           value="{{ old('autre_typepiece') }}"
                                                           class="required form-control @error('autre_typepiece') is-invalid @enderror"
                                                           placeholder="Précisez votre pièce">
                                                </div>
                                            </div><!-- /col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="form-group" id="numeropiece" style="display:block;">
                                                    <label>Numéro de la pièce <span style="color: red;">*</span></label>
                                                    <input type="text" name="numero_piece"
                                                           value="{{ old('numero_piece') }}"
                                                           class="required form-control @error('numero_piece') is-invalid @enderror"
                                                           placeholder="Numéro de la pièce">
                                                </div>
                                                <div class="form-group">
                                                    <label>Lieu de résidence<span style="color: red;">*</span></label>
                                                    {{--    <input type="text" name="lieu_residence_id" class="required form-control"
                                                               placeholder="Lieu de résidence">--}}
                                                    <div class="styled-select">
                                                        {{ html()->select('lieu_residence_id', $communes, old('lieu_residence_id'))->class('required')->placeholder('Selectionner Lieu de résidence') }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Situation matrimoniale <span
                                                            style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        {{ html()->select('situation_matrimoniale_id', $situationmatrimonial, old('situation_matrimoniale_id'))->class('required')->placeholder('Selectionner Situation')->id('situation_matrimoniale_id') }}
                                                        {{--<select class="required" name="situationmatrimoniale">
                                                            <option value="" selected></option>
                                                            <option value="1">Célibataire</option>
                                                            <option value="2">En concubinage</option>
                                                            <option value="3">Marié(e)</option>
                                                            <option value="4">Divorcé</option>
                                                            <option value="5">Veuf(ve)</option>
                                                        </select>--}}
                                                    </div>
                                                </div>
                                            </div><!-- /col-sm-6 -->

                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label>Région<span style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        {{ html()->select('region_id', $regions, old('region_id'))->class('required')->placeholder('Selectionner region')->id('region_id') }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Département<span style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        {{ html()->select('departement_id', $departements, old('departement_id'))->class('required')->placeholder('Selectionner departement')->id('departement_id') }}
                                                        {{-- <select class="required" name="situationmatrimoniale">
                                                             <option value="" selected></option>
                                                             <option value=""></option>

                                                         </select>--}}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sous-Préfecture<span style="color: red;">*</span></label>
                                                    <input type="text" name="sous_prefecture"
                                                           class="required form-control @error('sous_prefecture') is-invalid @enderror"
                                                           value="{{ old('sous_prefecture') }}"
                                                           placeholder="Sous-Préfecture">
                                                </div>
                                            </div><!-- /col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Situation de handicap<span
                                                            style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        <select
                                                            class="required @error('situation_handicap') is-invalid @enderror"
                                                            name="situation_handicap"
                                                            onchange="precisehandicap(this.value)">
                                                            <option value=""></option>
                                                            <option
                                                                value="1" {{ old('situation_handicap') == '1' ? 'selected' : '' }}>
                                                                OUI
                                                            </option>
                                                            <option
                                                                value="2" {{ old('situation_handicap') == '2' ? 'selected' : '' }}>
                                                                NON
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display:none;" id="precisehandicap">
                                                    <label>Précisez votre handicap <span
                                                            style="color: red;">*</span></label>
                                                    <input type="text" name="preciser_type_handicap"
                                                           value="{{ old('preciser_type_handicap') }}"
                                                           class="required form-control @error('preciser_type_handicap') is-invalid @enderror"
                                                           placeholder="Précisez votre handicap">
                                                </div>
                                                <div class="form-group">
                                                    <label>Scolarisé<span style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        <select
                                                            class="required @error('scolarise') is-invalid @enderror"
                                                            name="scolarise"
                                                            onchange="precisescolarite(this.value)">
                                                            <option value="" selected></option>
                                                            <option
                                                                value="1" {{ old('scolarise') == '1' ? 'selected' : '' }}>
                                                                Oui
                                                            </option>
                                                            <option
                                                                value="2" {{ old('scolarise') == '2' ? 'selected' : '' }}>
                                                                Non
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display:none;" id="preciseniveau">
                                                    <label>Niveau scolaire<span style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        {{ html()->select('niveau_scolaire_id', $niveauscolaires, old('niveau_scolaire_id'))->class('required')->placeholder('Selectionner niveau scolaire')->id('niveau_scolaire_id') }}

                                                        {{--<select class="required" name="">
                                                            <option value="" selected></option>
                                                            <option value="1">Cours primaire (CP1 au CP2)</option>
                                                            <option value="2">Cours élémentaire (CE1 au CE2)</option>
                                                            <option value="3">Cours moyen (CM1 au CM2)</option>
                                                            <option value="4">Secondaire général 1er cycle (6ieme à la
                                                                3ieme)
                                                            </option>
                                                            <option value="5">Secondaire professionnel 1er cycle
                                                            </option>
                                                            <option value="6">Secondaire général 2nd cycle (Seconde à la
                                                                terminale)
                                                            </option>
                                                            <option value="7">Secondaire professionnel 2nd cycle
                                                            </option>
                                                            <option value="8">Université / Ecole supérieure</option>
                                                            <option value="9">Ecole coranique</option>
                                                            <option value="10">Autre</option>
                                                        </select>--}}
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display:none;"
                                                     id="preciseniveauscolaire">
                                                    <label>Précisez niveau scolaire <span
                                                            style="color: red;">*</span></label>
                                                    <input type="text" name="preciser_niveau_scolaire"
                                                           value="{{ old('preciser_autre_niveau_scolaire') }}"
                                                           class="required form-control @error('preciser_autre_niveau_scolaire') is-invalid @enderror"
                                                           placeholder="Précisez niveau scolaire">
                                                </div>
                                                <div class="form-group" style="display:none;" id="precisediplome">
                                                    <label>Diplôme(s) obtenu(s)<span
                                                            style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        {{ html()->select('diplome_id', $diplomes, old('diplome_id'))->class('required')->placeholder('Selectionner diplôme')->id('diplome_id') }}
                                                        {{--<select class="required" name="">
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
                                                        </select>--}}
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display:none;" id="preciseautrediplome">
                                                    <label>Précisez autre diplome <span
                                                            style="color: red;">*</span></label>
                                                    <input type="text" name="preciser_autre_diplome"
                                                           value="{{ old('preciser_autre_diplome') }}"
                                                           class="required form-control @error('preciser_autre_diplome') is-invalid @enderror"
                                                           placeholder="Précisez autre diplome">
                                                </div>
                                                <div class="form-group">
                                                    <label>Êtes-vous membre d'une association?<span style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        <select
                                                            class="required @error('membre_association') is-invalid @enderror"
                                                            name="membre_association"
                                                            onchange="preciseassociation(this.value)">
                                                            <option value=""></option>
                                                            <option
                                                                value="1" {{ old('membre_association') == '1' ? 'selected' : '' }}>
                                                                Oui
                                                            </option>
                                                            <option
                                                                value="2" {{ old('membre_association') == '2' ? 'selected' : '' }}>
                                                                Non
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!-- /col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Situation professionnelle actuelle<span
                                                            style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        {{ html()->select('situation_professionel_id', $situationpros, old('situation_professionel_id'))->class('required')->placeholder('Selectionner situation professionelle')->id('situation_professionel_id') }}

                                                        {{--<select class="required" name="situationmatrimoniale"
                                                                onchange="precisesituationprof(this.value)">
                                                            <option value=""></option>
                                                            <option value="1">Travailleur</option>
                                                            <option value="2">Sans emploi</option>
                                                            <option value="3">Etudiant</option>
                                                            <option value="4">Elève</option>
                                                        </select>--}}
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display:none;" id="precisesituationprof">
                                                    <label>Précisez votre emploi<span
                                                            style="color: red;">*</span></label>
                                                    <input type="text" name="preciser_travail"
                                                           class="required form-control @error('preciser_travail') is-invalid @enderror"
                                                           placeholder="Précisez votre emploi">
                                                </div>

                                                <div class="form-group" style="display:none;" id="preciseassociation">
                                                    <label>Laquelle des associations ?<span style="color: red;">*</span></label>
                                                    <input type="text" name="preciser_association"
                                                           class="required form-control  @error('preciser_association') is-invalid @enderror"
                                                           placeholder="Laquelle des associations ?">
                                                </div>
                                                <div class="form-group" style="display:none;" id="precisedomaine">
                                                    <label>Dans quel domaine intervenez-vous?<span
                                                            style="color: red;">*</span></label>
                                                    <input type="text" name="domaine_intervention_asso"
                                                           class="required form-control @error('domaine_intervention_asso') is-invalid @enderror"
                                                           placeholder="Dans quel domaine intervenez-vous?">
                                                </div>

                                            </div><!-- /col-sm-6 -->

                                        </div><!-- /row-->
                                    </div>
                                    <!-- /middle-wizard -->
                                    <div id="bottom-wizard">
                                        <button type="submit" name="process" class="submit">Enregistrer</button>
                                    </div><!-- /bottom-wizard -->
                                </form>

                                <form id="structure" method="POST" action="{{ route('store') }}" style="display: none;">
                                @csrf()
                                <!-- Leave for security protection, read docs for details -->
                                    <div id="middle-wizard">

                                        <div class="row add_bottom_30">

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nom<span style="color: red;">*</span></label>
                                                    <input type="text" name="nom" value="{{ old('nom') }}"
                                                           class="form-control @error('nom') is-invalid @enderror"
                                                           placeholder="Nom">
                                                </div>
                                                <div class="form-group">
                                                    <label>N° d’enregistrement Pour les ONG et associations<span
                                                            style="color: red;">*</span></label>
                                                    <input type="text" name="numero_enregistrement"
                                                           value="{{old('numero_enregistrement') }}"
                                                           class="required form-control @error('numero_enregistrement') is-invalid @enderror"
                                                           placeholder="N° d’enregistrement Pour les ONG et associations">
                                                </div>
                                                <div class="form-group">
                                                    <label>N° du texte de création Pour les structures et parapubliques<span
                                                            style="color: red;">*</span></label>
                                                    <input type="text" name="numero_creation"
                                                           value="{{old('numero_creation') }}"
                                                           class="required form-control @error('numero_creation') is-invalid @enderror"
                                                           placeholder="N° du texte de création Pour les structures et parapubliques">
                                                </div>
                                            </div><!-- /col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Statut juridique<span style="color: red;">*</span></label>
                                                    <input type="text" name="statut_juridique"
                                                           class="required form-control @error('statut_juridique') is-invalid @enderror"
                                                           value="{{ old('statut_juridique') }}"
                                                           placeholder="Statut juridique">
                                                </div>
                                                <div class="form-group">
                                                    <label>Région<span style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        {{ html()->select('region_id', $regions, old('region_id'))->class('required')->placeholder('Selectionner region')->id('region_id') }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Adresse postale<span style="color: red;">*</span></label>
                                                    <input type="text" name="adresse_postal"
                                                           class="required form-control @error('adresse_postale') is-invalid @enderror"
                                                           value="{{old('adresse_postal') }}"
                                                           placeholder="Adresse postale">
                                                </div>
                                            </div><!-- /col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Département<span style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        {{ html()->select('departement_id', $departements, old('departement_id'))->class('required')->placeholder('Selectionner departement')->id('region_id') }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email<span style="color: red;">*</span></label>
                                                    <input type="email" name="email" value="{{old('email') }}"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Site web</label>
                                                    <input type="text" name="site_web" value="{{old('site_web') }}"
                                                           class="form-control @error('site_web') is-invalid @enderror"
                                                           placeholder="Site web">
                                                </div>
                                                <div class="form-group">
                                                    <label>Téléphone du répondant<span
                                                            style="color: red;">*</span></label>
                                                    <input type="text" name="telephone" value="{{ old('telephone') }}"
                                                           class="required form-control @error('telephone') is-invalid @enderror"
                                                           placeholder="Téléphone du répondant">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email du répondant<span style="color: red;">*</span></label>
                                                    <input type="text" name="email_repondant"
                                                           class="required form-control @error('email_repondant') is-invalid @enderror"
                                                           placeholder="Email du répondant"
                                                           value="{{old('email_repondant')}}">
                                                </div>

                                            </div><!-- /col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Fax</label>
                                                    <input type="text" name="fax"
                                                           class="form-control @error('fax') is-invalid @enderror"
                                                           placeholder="Fax" value="{{old('fax')}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nom du répondant<span style="color: red;">*</span></label>
                                                    <input type="text" name="nom_repondant"
                                                           class="required form-control @error('nom_repondant') is-invalid @enderror"
                                                           value="{{old('nom_repondant')}}"
                                                           placeholder="Nom du répondant">
                                                </div>
                                                <div class="form-group">
                                                    <label>Prenoms du répondant<span
                                                            style="color: red;">*</span></label>
                                                    <input type="text" name="prenom_repondant"
                                                           class="required form-control @error('prenom_repondant') is-invalid @enderror"
                                                           value="{{old('prenom_repondant')}}"
                                                           placeholder="Prenoms du répondant">
                                                </div>
                                                <div class="form-group">
                                                    <label>Fonction du répondant dans l’organisation<span
                                                            style="color: red;">*</span></label>
                                                    <input type="text" value="{{old('fonction_repondant_org') }}"
                                                           name="fonction_repondant_org"
                                                           class="required form-control @error('fonction_repondant_org') is-invalid @enderror"
                                                           placeholder="Fonction du répondant dans l’organisation">
                                                </div>

                                            </div><!-- /col-sm-6 -->


                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <h4>Domaine(s) d’intervention (plusieurs choix possibles) </h4>

                                                    <div class="row add_bottom_30">

                                                        <div class="col-sm-6">
                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="do[]" type="checkbox"
                                                                            value="1"
                                                                            class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Education / Formation
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="do[]" type="checkbox"
                                                                            value="2"
                                                                            class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Santé communautaire
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="do[]" type="checkbox"
                                                                            value="3"
                                                                            class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Assainissement/Environnement
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="do[]" type="checkbox"
                                                                            value="4" class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Promotion des droits humains
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="do[]" type="checkbox"
                                                                            value="5"
                                                                            class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Agriculture
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="do[]" type="checkbox"
                                                                            value="6"
                                                                            class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Appui aux organisations de base
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="do[]" type="checkbox"
                                                                            value="7" class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Développement communautaire
                                                                </label>
                                                            </div>

                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="do[]" type="checkbox"
                                                                            value="8" class="icheck required"
                                                                            style="position: absolute; opacity: 0;"
                                                                            onclick="precisedomaineintervention(this.value)">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Autre : <span style="display:none"
                                                                                  id="precisedomaineintervention"><input
                                                                            type="text" name="do_preciser_autre"
                                                                            class="required form-control"
                                                                            placeholder="Autre domaine"></span>
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
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="po[]" type="checkbox"
                                                                            value="1"
                                                                            class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Population générale
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="po[]" type="checkbox"
                                                                            value="2"
                                                                            class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Hommes
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="po[]" type="checkbox"
                                                                            value="3"
                                                                            class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Femmes
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="po[]" type="checkbox"
                                                                            value="4" class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Jeunes
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="po[]" type="checkbox"
                                                                            value="5"
                                                                            class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Enfants
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="po[]" type="checkbox"
                                                                            value="6"
                                                                            class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Personnes âgées
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="po[]" type="checkbox"
                                                                            value="7" class="icheck required"
                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Personnes vivant avec un handicap
                                                                </label>
                                                            </div>

                                                            <div class="form-group checkbox_questions">
                                                                <label class="">
                                                                    <div class="icheckbox_square-yellow checked"
                                                                         style="position: relative;"><input
                                                                            name="po[]" type="checkbox"
                                                                            value="8" class="icheck required"
                                                                            style="position: absolute; opacity: 0;"
                                                                            onclick="precisepopulationcible(this.value)">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                    Autre : <span style="display:none"
                                                                                  id="precisepopulationcible"> <input
                                                                            type="text" name="pop_preciser_autre"
                                                                            class="required form-control"
                                                                            placeholder="Autre population"></span>
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
                                                    <label>Effectif du Personnel<span
                                                            style="color: red;">*</span></label>
                                                    <input type="number" name="effectif_personnel"
                                                           value="{{old('effectif_personnel')}}"
                                                           class="required form-control @error('prenom_repondant') is-invalid @enderror"
                                                           placeholder="Effectif du Personnel">
                                                </div>
                                                <div class="form-group">
                                                    <label>Effectif Homme<span style="color: red;">*</span></label>
                                                    <input type="number" name="effectif_homme"
                                                           value="{{old('effectif_homme')}}"
                                                           class="required form-control @error('prenom_repondant') is-invalid @enderror"
                                                           placeholder="Effectif Homme">
                                                </div>
                                                <div class="form-group">
                                                    <label>Effectif Femme<span style="color: red;">*</span></label>
                                                    <input type="number" name="effectif_femme"
                                                           value="{{old('effectif_femme')}}"
                                                           class="required form-control @error('prenom_repondant') is-invalid @enderror"
                                                           placeholder="Effectif Femme">
                                                </div>
                                            </div><!-- /col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Effectif Salariés<span style="color: red;">*</span></label>
                                                    <input type="number" name="effectif_salaries"
                                                           value="{{old('effectif_salaries')}}"
                                                           class="required form-control @error('effectif_salaries') is-invalid @enderror"
                                                           placeholder="Effectif Salariés">
                                                </div>
                                                <div class="form-group">
                                                    <label>Effectif Contractuels<span
                                                            style="color: red;">*</span></label>
                                                    <input type="number" name="effectif_contractuels"
                                                           value="{{old('effectif_contractuels')}}"
                                                           class="required form-control @error('effectif_contractuels') is-invalid @enderror"
                                                           placeholder="Effectif Contractuels">
                                                </div>
                                                <div class="form-group">
                                                    <label>Effectif Bénévoles<span
                                                            style="color: red;">*</span></label>
                                                    <input type="number" name="effectif_benevoles"
                                                           value="{{old('effectif_benevoles')}}"
                                                           class="required form-control @error('effectif_benevoles') is-invalid @enderror"
                                                           placeholder="Effectif Bénévoles">
                                                </div>
                                            </div><!-- /col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Montant du budget de l’année en cours<span
                                                            style="color: red;">*</span></label>
                                                    <input type="number" name="montant_budget_anneeencour"
                                                           value="{{old('montant_budget_anneeencour')}}"
                                                           class="required form-control @error('montant_budget_anneeencour') is-invalid @enderror"
                                                           placeholder="Montant du budget de l’année en cours">
                                                </div>
                                            <!-- <div class="form-group">
                                                    <label>Année 2019<span style="color: red;">*</span></label>
                                                    <input type="number" name="montant_budget_2019" class="required form-control @error('montant_budget_2019') is-invalid @enderror" value="{{old('montant_budget_2019')}}"
                                                           placeholder="Année 2019">
                                                </div>
                                                <div class="form-group">
                                                    <label>Année 2018<span style="color: red;">*</span></label>
                                                    <input type="number" name="montant_budget_2018" value="{{old('montant_budget_2018')}}" class="required form-control @error('montant_budget_2018') is-invalid @enderror"
                                                           placeholder="Année 2018">
                                                </div> -->
                                            </div><!-- /col-sm-6 -->

                                            <div class="col-sm-6">
                                            <!-- <div class="form-group">
                                                    <label>Année 2017<span style="color: red;">*</span></label>
                                                    <input type="number" name="montant_budget_2017"  value="{{old('montant_budget_2017')}}" class="required form-control @error('montant_budget_2017') is-invalid @enderror"
                                                           placeholder="Année 2017">
                                                </div> -->
                                                <div class="form-group">
                                                    <label>Désirez-vous nous communiquer d’autres informations ?<span
                                                            style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        <select
                                                            class="required @error('status_autreinfo') is-invalid @enderror"
                                                            name="status_autreinfo"
                                                            onchange="preciseinformation(this.value)">
                                                            <option value="" selected></option>
                                                            <option
                                                                value="1" {{ old('status_autreinfo') == '1' ? 'selected' : '' }}>
                                                                Oui
                                                            </option>
                                                            <option
                                                                value="2" {{ old('status_autreinfo') == '2' ? 'selected' : '' }}>
                                                                Non
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display:none;" id="preciseinformation">
                                                    <label>Quelles informations ?</label>
                                                    <input type="text" name="preciser_autreinfo"
                                                           value="{{old('preciser_autreinfo')}}"
                                                           class="required form-control  @error('preciser_autreinfo') is-invalid @enderror"
                                                           placeholder="Quelles informations ?">
                                                </div>
                                            </div><!-- /col-sm-6 -->

                                        </div><!-- /row-->

                                    </div><!-- /middle-wizard -->
                                    <div id="bottom-wizard">
                                        <button type="submit" name="process" class="submit">Enregistrer</button>
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

        function displayform(form_id) {
            if (form_id == 2) {
                $("#particulier").css("display", "block");
                $("#structure").css("display", "none");
            } else if(form_id == 1) {
                $("#particulier").css("display", "none");
                $("#structure").css("display", "block");
            }
        }

        $('#nationalite_id').on('change', function (e) {
            if ($(this).val() == 2) {
                $("#precisenationalite").css("display", "block");
            } else {
                $("#precisenationalite").css("display", "none");
            }
        })


        $('#type_piece_id').on('change', function () {
            if ($(this).val() == 5) {
                $("#precisepiece").css("display", "block");
            } else {
                $("#precisepiece").css("display", "none");
            }

            if ($(this).val() == 6) {
                $("#numeropiece").css("display", "none");
            } else {
                $("#numeropiece").css("display", "block");
            }
        })

        $('#niveau_scolaire_id').on('change', function () {
            if ($(this).val() == 10) {
                $("#preciseniveauscolaire").css("display", "block");
            } else {
                $("#preciseniveauscolaire").css("display", "none");
            }

        })

        $('#diplome_id').on('change', function () {

            if ($(this).val() == 10) {

                $("#preciseautrediplome").css("display", "block");

            } else {
                $("#preciseautrediplome").css("display", "none");
            }

        })

        function precisehandicap(id) {

            if (id == 1) {
                $("#precisehandicap").css("display", "block");
            } else {
                $("#precisehandicap").css("display", "none");
            }

        }

        function precisescolarite(id) {

            if (id == 1) {
                $("#preciseniveau").css("display", "block");
                $("#precisediplome").css("display", "block");
            } else {
                $("#preciseniveau").css("display", "none");
                $("#precisediplome").css("display", "none");
            }

        }

        function preciseassociation(id) {

            if (id == 1) {
                $("#preciseassociation").css("display", "block");
                $("#precisedomaine").css("display", "block");
            } else {
                $("#preciseassociation").css("display", "none");
                $("#precisedomaine").css("display", "none");
            }

        }

        $('#situation_professionel_id').on('change', function (e) {
            if ($(this).val() == 1) {
                $("#precisesituationprof").css("display", "block");
            } else {
                $("#precisesituationprof").css("display", "none");
            }
        })

        function preciseinformation(id) {

            if (id == 1) {
                $("#preciseinformation").css("display", "block");
            } else {
                $("#preciseinformation").css("display", "none");
            }

        }

        clickCount1 = 0;

        function precisedomaineintervention(id) {

            var span = document.getElementById("precisedomaineintervention");

            clickCount1++;

            if (clickCount1 % 2 === 1) {
                span.style.display = "inline-block"; // Affiche le span au premier clic
            } else {
                span.style.display = "none"; // Masque le span au deuxième clic
            }

        }

        clickCount = 0;

        function precisepopulationcible(id) {
            var span = document.getElementById("precisepopulationcible");

            clickCount++;

            if (clickCount % 2 === 1) {
                span.style.display = "inline-block"; // Affiche le span au premier clic
            } else {
                span.style.display = "none"; // Masque le span au deuxième clic
            }

        }
    </script>

@endsection
