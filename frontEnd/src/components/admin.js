import React from "react";
import "../styles/admin_card.css";
export default function Admin() {
  return (
    <div>
      <div className="row1-container">
        <div className="box box-down cyan">
          <h2>Vice-Presidente</h2>
          <p>Monitors activity to identify project roadblocks</p>
          <img src="https://assets.codepen.io/2301174/icon-supervisor.svg"/>
        </div>

        <div className="box red">
          <h2>President</h2>
          <p>
            Scans our talent network to create the optimal team for your project
          </p>
          <img src="https://assets.codepen.io/2301174/icon-team-builder.svg"/>
        </div>

        <div className="box box-down blue">
          <h2>Secretaire</h2>
          <p>
            Uses data from past projects to provide better delivery estimates
          </p>
          <img  src="https://assets.codepen.io/2301174/icon-calculator.svg" />
        </div>
      </div>
      <div className="row2-container">
        <div className="box orange">
          <h2>Comminucant</h2>
          <p>Regularly evaluates our talent to ensure quality</p>
          <img src="https://assets.codepen.io/2301174/icon-karma.svg" />
        </div>
        
      </div>
    </div>
  );
}
