import React, { useState, useEffect } from "react";
import { Button, FloatingLabel, Modal, Form } from "react-bootstrap";
function Model() {
  const [show, setShow] = useState(false);

  const handleClose = () => setShow(false);
  const handleShow = () => setShow(true);

  return (
    <>
      <Button variant="primary" onClick={handleShow}>
        Repondre
      </Button>

      <Modal
        show={show}
        onHide={handleClose}
        backdrop="static"
        keyboard={false}
      >
        <Modal.Header closeButton>
          <Modal.Title>Modal title</Modal.Title>
        </Modal.Header>
        <Modal.Body>
          <>
            <FloatingLabel controlId="floatingTextarea2" label="Reponse...">
              <Form.Control
                as="textarea"
                placeholder="Ecrivez votre reponse ici"
                style={{ height: "100px" }}
              />
            </FloatingLabel>
          </>
        </Modal.Body>
        <Modal.Footer>
          <Button variant="outline-danger" onClick={handleClose}>
            Fermer
          </Button>
          <Button variant="primary">Repondre</Button>
        </Modal.Footer>
      </Modal>
    </>
  );
}
export default Model;
