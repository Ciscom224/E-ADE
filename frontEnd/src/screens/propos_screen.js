import React from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import HeadForum from "../components/head_forum";
import "../styles/apropos_style.css";
import Admin from "../components/admin";
export default function ProposScreen() {
  return (
    <div>
      <HeadForum titleHead="ADE - ENSAT" />
      <div className="container">
        <section className="presentation">
          <h3> Présentation</h3>
          <div className="row">
            <div className="col-md-8">
              <p>
                L'Association Des Etudiants de ENSA (Ecole Nationale des
                Sciences Appliquées) de Tanger est une entité independante et
                acteur central de la vie de l'école comportant aujourd'hui plus
                1350. Ayant pour vision de fournir au profit des futurs
                ingenieurs , une formation theorique , pratique et un bon
                deroulement de la vie estudiantine .
              </p>
            </div>
            <div className="col-md-4 photo"></div>
          </div>
        </section>
        <section className="presentation">
          <h3> Objectif</h3>
          <div className="row">
            <div className="col-md-12">
              <p>
                Pour parvenir a ces fins, l'ADE met en place une strategie
                déployée sur tous les niveaux ! En effet elle a pour principaux
                objectifs :<ul>
                  <li>
                    Renforcez le lien entre ces adherents , étudiants de de l'ENSAT, et leur esprit
                    d'appartenance à l'établisseements;
                  </li>
                  <li>Défendre et veiller à consolider les valeurs de l'ENSAT auprès de ses adhérents
                    et vis - à - vis de l'exterieur;
                  </li>
                  <li>Contribuer au renforcement de la notoriétè de l'ENSAT vis - à - vis de l'exterieur;</li>
                  <li>Organiser des manifestations susceptibles de promouvoir le rayonnement de l'école</li>
                  <li>Fédérer les différents clubs de l'établissement et les soutenir à porter leur projets
                    tout au long de l'année.
                  </li>
                  <li>Organise des espaces de rencontres, des ateliers de formation au profit des étudiants de l'école.</li>
                </ul>
              </p>
            </div>
          </div>
        </section>

        <section className="presentation">
          <h3> Membres du Bureau</h3>
          <div className="row">
            <div className="col-md-12">
                  <Admin/>
            </div>
          </div>
        </section>
      </div>
    </div>
  );
}
