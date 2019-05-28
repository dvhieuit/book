package com.example.demo.controller;

import com.example.demo.model.Post;
import com.example.demo.service.PostService;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import javax.validation.Valid;
import java.net.URI;
import java.net.URISyntaxException;
import java.util.List;

@RestController
@CrossOrigin("http://localhost:3000")
@RequestMapping("/api")
public class PostController {

    private final Logger log = LoggerFactory.getLogger(PostController.class);

    @Autowired
    PostService postService;

    @GetMapping("/post/list")
    List<Post>  list() {
        return postService.listPost();
    }

    @GetMapping("/post/{postId}")
    ResponseEntity<?> getPost(@PathVariable Long postId) {
        return postService.findById(postId);
    }

    @PostMapping("/post")
    ResponseEntity<Post> createPost(@Valid @RequestBody Post post) throws URISyntaxException {
        Post newPost = postService.savePost(post);
        return ResponseEntity.created(new URI("/api/post" + newPost.getId())).body(newPost);
    }

    @PutMapping("/post")
    ResponseEntity<Post> updatePost(@Valid @RequestBody Post post) {
        Post newPost = postService.savePost(post);
        return ResponseEntity.ok().body(newPost);
    }

    @DeleteMapping("/post/{postId}")
    ResponseEntity deletePost(@PathVariable Long postId) {
        postService.deletePost(postId);
        return ResponseEntity.ok().build();
    }
}