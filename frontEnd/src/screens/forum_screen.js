import React, { useState, useEffect } from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import HeadForum from "../components/head_forum";
import Pub from "../components/pub";
import { Button, ListGroup, Badge } from "react-bootstrap";
import "../styles/forum_style.css";
import https from "../https";
import Model from "../components/model";
import Comments from "../components/comments";

function ForumScreen() {
  const [posts, setPosts] = useState([]);

  const [inputs, setInputs] = useState({});

  useEffect(() => {
    fetchAllPosts();
  }, []);

  const fetchAllPosts = () => {
    https.get("/getAll/post").then((res) => {
      setPosts(res.data);

      // console.log(res.data);
    });
  };

  const handleChange = (event) => {
    const content = event.target.content;
    const sender = 10;

    // setInputs((values) => ());
  };
  const submitFor = () => {
  
    console.log(inputs);
    https.post("/store/post",inputs).then((res) => {
      console.log(res);
      });
  };
  console.log(posts);
  return (
    <div className="container-fuild">
      <HeadForum titleHead="ADE - FORUM" />
      <div className="row ">
        <div className="col-md-4 col-sm-3">
          <Pub />
        </div>
        <div className="col-md-8 col-sm-9 forms">
          <div className="form-floating">
            <textarea
              className="form-control"
              name="content"
              onChange={(e)=>{
                setInputs({
                  sender:10,
                  container:e.target.value
                })
              }}
              placeholder="Leave a comment here"
              id="floatingTextarea2"
            ></textarea>
            <label>Comments</label>
          </div>
          <Button className="btn btn-primary" onClick={submitFor}>
            Envoyer
          </Button>
        </div>

        <div className="postData">
          <h1>Les messages reccents</h1>
          <div>
            <ListGroup as="ul">
            {posts.map((post) => {
                  return   <ListGroup.Item
                  as="li"
                  className="d-flex justify-content-between align-items-start"
                >
                 
                  <div className="ms-2 me-auto">
                    <div className="fw-bold">{post.id}</div>
                    <div className="bodyAll">
                      <div className=" postItem">
                        <div className="item">{post.container}</div>
                        <div className="item">
                          <Model id_post={1} />
                        </div>
                      </div>
                      <div className="comment">
                        <Comments id_post={post.id}/>
                      </div>
                    </div>
                  </div>
                  <Badge bg="danger" pill>
                    {3}
                  </Badge>
                </ListGroup.Item>;
                })}
            
            </ListGroup>
          </div>
        </div>
      </div>
    </div>
  );
}
export default ForumScreen;
