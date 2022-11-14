<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221113172718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_podcast ADD CONSTRAINT FK_103045C312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_podcast ADD CONSTRAINT FK_103045C3786136AB FOREIGN KEY (podcast_id) REFERENCES podcast (id) ON DELETE CASCADE');
        $this->addSql('DROP INDEX IDX_9474526CA60DA673 ON comment');
        $this->addSql('ALTER TABLE comment CHANGE podcast_id podcast_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C786136AB FOREIGN KEY (podcast_id) REFERENCES podcast (id)');
        $this->addSql('CREATE INDEX IDX_9474526C786136AB ON comment (podcast_id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93786136AB FOREIGN KEY (podcast_id) REFERENCES podcast (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A9312469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE menu_menu ADD CONSTRAINT FK_B54ACADD8CCD27AB FOREIGN KEY (menu_source) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menu ADD CONSTRAINT FK_B54ACADD95287724 FOREIGN KEY (menu_target) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE podcast ADD featured_image_id INT DEFAULT NULL, ADD shortcode VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE podcast ADD CONSTRAINT FK_D7E805BD3569D950 FOREIGN KEY (featured_image_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_D7E805BD3569D950 ON podcast (featured_image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_podcast DROP FOREIGN KEY FK_103045C312469DE2');
        $this->addSql('ALTER TABLE category_podcast DROP FOREIGN KEY FK_103045C3786136AB');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C786136AB');
        $this->addSql('DROP INDEX IDX_9474526C786136AB ON comment');
        $this->addSql('ALTER TABLE comment CHANGE podcast_id podcasts_id INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_9474526CA60DA673 ON comment (podcasts_id)');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93786136AB');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A9312469DE2');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93C4663E4');
        $this->addSql('ALTER TABLE menu_menu DROP FOREIGN KEY FK_B54ACADD8CCD27AB');
        $this->addSql('ALTER TABLE menu_menu DROP FOREIGN KEY FK_B54ACADD95287724');
        $this->addSql('ALTER TABLE podcast DROP FOREIGN KEY FK_D7E805BD3569D950');
        $this->addSql('DROP INDEX IDX_D7E805BD3569D950 ON podcast');
        $this->addSql('ALTER TABLE podcast DROP featured_image_id, DROP shortcode');
    }
}