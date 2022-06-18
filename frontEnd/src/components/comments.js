import React, { useState, useEffect,useContext } from "react";
import https from "../https";
import { Card, AccordionContext ,ListGroup} from "react-bootstrap";
import Accordion from "react-bootstrap/Accordion";
import { useAccordionButton } from "react-bootstrap/AccordionButton";

function ContextAwareToggle({ children, eventKey, callback }) {
  const { activeEventKey } = useContext(AccordionContext);

  const decoratedOnClick = useAccordionButton(
    eventKey,
    () => callback && callback(eventKey)
  );

  const isCurrentEventKey = activeEventKey === eventKey;

  return (
    <button
      type="button"
      style={{ backgroundColor: isCurrentEventKey ? "green" : "lavender" }}
      onClick={decoratedOnClick}
    >
      {children}
    </button>
  );
}

function Comments(props) {
  const [coms, setCom] = useState([]);

  


  const fetchAllComments = () => {
    https.get(`/getAll_post_comments/2`).then((res) => {
      setCom(res.data.comments);
      coms=res.data.comments;
      console.log(res.data.comments);
    });
  };
  useEffect(() => {
    fetchAllComments();
  }, []);
  return (
    <Accordion defaultActiveKey={["0"]} alwaysOpen className="containerAn">
      <Accordion.Item eventKey="0">
        <Accordion.Header className="hea">Les Commentaires</Accordion.Header>
        <Accordion.Body>
          <div className="reponse">
            {coms.map((com)=>{
              <h1>{com.id}</h1>
            })}

          </div>
            
          
        </Accordion.Body>
      </Accordion.Item>
    </Accordion>
  );
}

export default Comments;
