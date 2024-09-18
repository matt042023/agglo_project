<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240525184634 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activityarea (id INT AUTO_INCREMENT NOT NULL, activity_area_name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apropos (id INT AUTO_INCREMENT NOT NULL, title_apropos VARCHAR(50) NOT NULL, content_apropos LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, prosuccess_id INT NOT NULL, comment_text VARCHAR(500) NOT NULL, date DATETIME NOT NULL, INDEX IDX_5F9E962A67B3B43D (users_id), INDEX IDX_5F9E962AFB6C1914 (prosuccess_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contacts (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, name VARCHAR(50) DEFAULT NULL, email VARCHAR(100) NOT NULL, object VARCHAR(50) DEFAULT NULL, content VARCHAR(500) NOT NULL, date DATETIME NOT NULL, INDEX IDX_3340157367B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE events (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, description VARCHAR(500) NOT NULL, address VARCHAR(255) NOT NULL, date DATETIME NOT NULL, nb_participants INT DEFAULT NULL, max_participant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE events_activityarea (events_id INT NOT NULL, activityarea_id INT NOT NULL, INDEX IDX_715581E09D6A1065 (events_id), INDEX IDX_715581E0164A471F (activityarea_id), PRIMARY KEY(events_id, activityarea_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gamifications (id INT AUTO_INCREMENT NOT NULL, roles_id INT DEFAULT NULL, questions VARCHAR(500) NOT NULL, points INT NOT NULL, UNIQUE INDEX UNIQ_DB1F936B38C751C4 (roles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home_page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, background_image VARCHAR(255) DEFAULT NULL, subtitle VARCHAR(255) DEFAULT NULL, sub_description LONGTEXT DEFAULT NULL, sub_image VARCHAR(255) DEFAULT NULL, web_site_description LONGTEXT DEFAULT NULL, second_bloc_title VARCHAR(255) DEFAULT NULL, second_bloc_description LONGTEXT DEFAULT NULL, second_bloc_image VARCHAR(255) DEFAULT NULL, second_bloc_sub_title VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mentionslegales (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messagings (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, date DATETIME NOT NULL, message VARCHAR(500) NOT NULL, INDEX IDX_21558B7F67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notifications (id INT AUTO_INCREMENT NOT NULL, events_id INT DEFAULT NULL, resources_id INT DEFAULT NULL, pro_success_id INT DEFAULT NULL, messagings_id INT DEFAULT NULL, message VARCHAR(500) NOT NULL, date DATETIME NOT NULL, INDEX IDX_6000B0D39D6A1065 (events_id), INDEX IDX_6000B0D3ACFC5BFF (resources_id), INDEX IDX_6000B0D3154D8751 (pro_success_id), INDEX IDX_6000B0D3FA9A0E87 (messagings_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prosuccess (id INT AUTO_INCREMENT NOT NULL, activity_area_id INT NOT NULL, title VARCHAR(50) NOT NULL, image VARCHAR(255) DEFAULT NULL, history LONGTEXT NOT NULL, author VARCHAR(50) NOT NULL, publication_date DATETIME NOT NULL, address VARCHAR(255) DEFAULT NULL, nb_view INT DEFAULT NULL, INDEX IDX_3031B466BD5D367C (activity_area_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reactions (id INT AUTO_INCREMENT NOT NULL, prosuccess_id INT NOT NULL, users_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_38737FB3FB6C1914 (prosuccess_id), INDEX IDX_38737FB367B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resources (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(50) NOT NULL, title VARCHAR(100) NOT NULL, description VARCHAR(500) DEFAULT NULL, publication_date DATETIME NOT NULL, author VARCHAR(100) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, video VARCHAR(255) DEFAULT NULL, other_content VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, role_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, activity_area_id INT DEFAULT NULL, role_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, last_name VARCHAR(50) NOT NULL, first_name VARCHAR(50) NOT NULL, photo VARCHAR(100) DEFAULT NULL, birthdate DATETIME NOT NULL, address VARCHAR(100) NOT NULL, goal VARCHAR(100) DEFAULT NULL, school_career VARCHAR(100) DEFAULT NULL, professionnal_career VARCHAR(100) DEFAULT NULL, instagram VARCHAR(50) DEFAULT NULL, facebook VARCHAR(50) DEFAULT NULL, linked_in VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), INDEX IDX_1483A5E9BD5D367C (activity_area_id), INDEX IDX_1483A5E9D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_resources (users_id INT NOT NULL, resources_id INT NOT NULL, INDEX IDX_891B914F67B3B43D (users_id), INDEX IDX_891B914FACFC5BFF (resources_id), PRIMARY KEY(users_id, resources_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_events (users_id INT NOT NULL, events_id INT NOT NULL, INDEX IDX_5C60D9DA67B3B43D (users_id), INDEX IDX_5C60D9DA9D6A1065 (events_id), PRIMARY KEY(users_id, events_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_gamifications (users_id INT NOT NULL, gamifications_id INT NOT NULL, INDEX IDX_D2FA9B6667B3B43D (users_id), INDEX IDX_D2FA9B66F5A73506 (gamifications_id), PRIMARY KEY(users_id, gamifications_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_notifications (users_id INT NOT NULL, notifications_id INT NOT NULL, INDEX IDX_69E5B8DE67B3B43D (users_id), INDEX IDX_69E5B8DED4BE081 (notifications_id), PRIMARY KEY(users_id, notifications_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mentors_followers (follower_id INT NOT NULL, mentor_id INT NOT NULL, INDEX IDX_1B0E24C6AC24F853 (follower_id), INDEX IDX_1B0E24C6DB403044 (mentor_id), PRIMARY KEY(follower_id, mentor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AFB6C1914 FOREIGN KEY (prosuccess_id) REFERENCES prosuccess (id)');
        $this->addSql('ALTER TABLE contacts ADD CONSTRAINT FK_3340157367B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE events_activityarea ADD CONSTRAINT FK_715581E09D6A1065 FOREIGN KEY (events_id) REFERENCES events (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE events_activityarea ADD CONSTRAINT FK_715581E0164A471F FOREIGN KEY (activityarea_id) REFERENCES activityarea (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gamifications ADD CONSTRAINT FK_DB1F936B38C751C4 FOREIGN KEY (roles_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE messagings ADD CONSTRAINT FK_21558B7F67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D39D6A1065 FOREIGN KEY (events_id) REFERENCES events (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3ACFC5BFF FOREIGN KEY (resources_id) REFERENCES resources (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3154D8751 FOREIGN KEY (pro_success_id) REFERENCES prosuccess (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3FA9A0E87 FOREIGN KEY (messagings_id) REFERENCES messagings (id)');
        $this->addSql('ALTER TABLE prosuccess ADD CONSTRAINT FK_3031B466BD5D367C FOREIGN KEY (activity_area_id) REFERENCES activityarea (id)');
        $this->addSql('ALTER TABLE reactions ADD CONSTRAINT FK_38737FB3FB6C1914 FOREIGN KEY (prosuccess_id) REFERENCES prosuccess (id)');
        $this->addSql('ALTER TABLE reactions ADD CONSTRAINT FK_38737FB367B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9BD5D367C FOREIGN KEY (activity_area_id) REFERENCES activityarea (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9D60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE users_resources ADD CONSTRAINT FK_891B914F67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_resources ADD CONSTRAINT FK_891B914FACFC5BFF FOREIGN KEY (resources_id) REFERENCES resources (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_events ADD CONSTRAINT FK_5C60D9DA67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_events ADD CONSTRAINT FK_5C60D9DA9D6A1065 FOREIGN KEY (events_id) REFERENCES events (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_gamifications ADD CONSTRAINT FK_D2FA9B6667B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_gamifications ADD CONSTRAINT FK_D2FA9B66F5A73506 FOREIGN KEY (gamifications_id) REFERENCES gamifications (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_notifications ADD CONSTRAINT FK_69E5B8DE67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_notifications ADD CONSTRAINT FK_69E5B8DED4BE081 FOREIGN KEY (notifications_id) REFERENCES notifications (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mentors_followers ADD CONSTRAINT FK_1B0E24C6AC24F853 FOREIGN KEY (follower_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE mentors_followers ADD CONSTRAINT FK_1B0E24C6DB403044 FOREIGN KEY (mentor_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A67B3B43D');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AFB6C1914');
        $this->addSql('ALTER TABLE contacts DROP FOREIGN KEY FK_3340157367B3B43D');
        $this->addSql('ALTER TABLE events_activityarea DROP FOREIGN KEY FK_715581E09D6A1065');
        $this->addSql('ALTER TABLE events_activityarea DROP FOREIGN KEY FK_715581E0164A471F');
        $this->addSql('ALTER TABLE gamifications DROP FOREIGN KEY FK_DB1F936B38C751C4');
        $this->addSql('ALTER TABLE messagings DROP FOREIGN KEY FK_21558B7F67B3B43D');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D39D6A1065');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3ACFC5BFF');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3154D8751');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3FA9A0E87');
        $this->addSql('ALTER TABLE prosuccess DROP FOREIGN KEY FK_3031B466BD5D367C');
        $this->addSql('ALTER TABLE reactions DROP FOREIGN KEY FK_38737FB3FB6C1914');
        $this->addSql('ALTER TABLE reactions DROP FOREIGN KEY FK_38737FB367B3B43D');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9BD5D367C');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9D60322AC');
        $this->addSql('ALTER TABLE users_resources DROP FOREIGN KEY FK_891B914F67B3B43D');
        $this->addSql('ALTER TABLE users_resources DROP FOREIGN KEY FK_891B914FACFC5BFF');
        $this->addSql('ALTER TABLE users_events DROP FOREIGN KEY FK_5C60D9DA67B3B43D');
        $this->addSql('ALTER TABLE users_events DROP FOREIGN KEY FK_5C60D9DA9D6A1065');
        $this->addSql('ALTER TABLE users_gamifications DROP FOREIGN KEY FK_D2FA9B6667B3B43D');
        $this->addSql('ALTER TABLE users_gamifications DROP FOREIGN KEY FK_D2FA9B66F5A73506');
        $this->addSql('ALTER TABLE users_notifications DROP FOREIGN KEY FK_69E5B8DE67B3B43D');
        $this->addSql('ALTER TABLE users_notifications DROP FOREIGN KEY FK_69E5B8DED4BE081');
        $this->addSql('ALTER TABLE mentors_followers DROP FOREIGN KEY FK_1B0E24C6AC24F853');
        $this->addSql('ALTER TABLE mentors_followers DROP FOREIGN KEY FK_1B0E24C6DB403044');
        $this->addSql('DROP TABLE activityarea');
        $this->addSql('DROP TABLE apropos');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE contacts');
        $this->addSql('DROP TABLE events');
        $this->addSql('DROP TABLE events_activityarea');
        $this->addSql('DROP TABLE gamifications');
        $this->addSql('DROP TABLE home_page');
        $this->addSql('DROP TABLE mentionslegales');
        $this->addSql('DROP TABLE messagings');
        $this->addSql('DROP TABLE notifications');
        $this->addSql('DROP TABLE prosuccess');
        $this->addSql('DROP TABLE reactions');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE resources');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_resources');
        $this->addSql('DROP TABLE users_events');
        $this->addSql('DROP TABLE users_gamifications');
        $this->addSql('DROP TABLE users_notifications');
        $this->addSql('DROP TABLE mentors_followers');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
