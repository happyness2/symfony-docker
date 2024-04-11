<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240405140855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE commentaires_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE comments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE comments (id INT NOT NULL, articles_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5F9E962A1EBAF6CC ON comments (articles_id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A1EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commentaires DROP CONSTRAINT fk_d9bec0c41ebaf6cc');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('ALTER TABLE articles ALTER description TYPE TEXT');
        $this->addSql('ALTER TABLE articles ALTER description TYPE TEXT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE comments_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE commentaires_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE commentaires (id INT NOT NULL, articles_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_d9bec0c41ebaf6cc ON commentaires (articles_id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT fk_d9bec0c41ebaf6cc FOREIGN KEY (articles_id) REFERENCES articles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comments DROP CONSTRAINT FK_5F9E962A1EBAF6CC');
        $this->addSql('DROP TABLE comments');
        $this->addSql('ALTER TABLE articles ALTER description TYPE VARCHAR(200)');
    }
}
