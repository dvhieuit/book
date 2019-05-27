package io.spring.demo.listener;

import io.spring.demo.model.Customer;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.batch.core.BatchStatus;
import org.springframework.batch.core.JobExecution;
import org.springframework.batch.core.listener.JobExecutionListenerSupport;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Component;


@Component
public class JobNoticeCompletionListener extends JobExecutionListenerSupport {
    private static final Logger log = LoggerFactory.getLogger(JobNoticeCompletionListener.class);
    private final JdbcTemplate jdbcTemplate;

    @Autowired
    public JobNoticeCompletionListener(JdbcTemplate jdbcTemplate) {this.jdbcTemplate = jdbcTemplate;}

    @Override
    public void afterJob(JobExecution jobExecution){
        if (jobExecution.getStatus() == BatchStatus.COMPLETED){
            log.info("!!! JOB FINISHED! Wait time to verify results");

            jdbcTemplate.query("SELECT id, first_name, last_name, email, phone, address FROM customer",
                    (rs, row) -> new Customer(
                            rs.getString(1),
                            rs.getString(2),
                            rs.getString(3),
                            rs.getString(4),
                            rs.getString(5),
                            rs.getString(6))
                    ).forEach(customer -> log.info("Found <"+ customer+"> in database."));
        }
    }

}
