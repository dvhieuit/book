package com.example.demo.processor;


import com.example.demo.model.User;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.batch.item.ItemProcessor;

public class UserItemProcessor implements ItemProcessor<User, User> {
    private static final Logger log = LoggerFactory.getLogger(UserItemProcessor.class);

    @Override
    public User process(User user) throws Exception {
        int idUser = user.getIdUser();
        String firstName = user.getFirstName();
        String lastName = user.getLastName();

        final User transformedUser = new User(idUser, firstName, lastName);

        log.info("Converting (" + user + ") into (" + transformedUser + ")");

        return transformedUser;
    }
}
