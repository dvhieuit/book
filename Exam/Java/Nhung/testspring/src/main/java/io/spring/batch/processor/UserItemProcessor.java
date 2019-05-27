package io.spring.batch.processor;

import io.spring.batch.model.User;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.batch.item.ItemProcessor;

public class UserItemProcessor implements ItemProcessor<User,User> {
    private static final Logger log = LoggerFactory.getLogger(UserItemProcessor.class);

    @Override
    public User process(User user) throws Exception {
        Integer id = user.getId();
        String firstName = user.getFirstName().toUpperCase();
        String lastName = user.getLastName().toUpperCase();
        String email = user.getEmail();
        String phone = user.getPhone();
        String address = user.getAddress();

        final User transformedUser = new User(id, firstName, lastName, email, phone, address);

        log.info("Converting (" + user + ") into (" + transformedUser + ")");

        return transformedUser;
    }
}
