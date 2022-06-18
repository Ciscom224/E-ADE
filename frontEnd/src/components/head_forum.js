import React from "react";

function  HeadForum(props){
    return(
        <div className="container head">
            {console.log(props)}
          <h2  className="titleHead">{props.titleHead}</h2>
        </div>
    );
}

export default HeadForum;