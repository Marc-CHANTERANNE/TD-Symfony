<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210118091443 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_6BAF78709F8008B6');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ingredient AS SELECT id, cake_id, name, is_allergen FROM ingredient');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('CREATE TABLE ingredient (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cake_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, is_allergen BOOLEAN NOT NULL, CONSTRAINT FK_6BAF78709F8008B6 FOREIGN KEY (cake_id) REFERENCES cake (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO ingredient (id, cake_id, name, is_allergen) SELECT id, cake_id, name, is_allergen FROM __temp__ingredient');
        $this->addSql('DROP TABLE __temp__ingredient');
        $this->addSql('CREATE INDEX IDX_6BAF78709F8008B6 ON ingredient (cake_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_6BAF78709F8008B6');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ingredient AS SELECT id, cake_id, name, is_allergen FROM ingredient');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('CREATE TABLE ingredient (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cake_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, is_allergen BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO ingredient (id, cake_id, name, is_allergen) SELECT id, cake_id, name, is_allergen FROM __temp__ingredient');
        $this->addSql('DROP TABLE __temp__ingredient');
        $this->addSql('CREATE INDEX IDX_6BAF78709F8008B6 ON ingredient (cake_id)');
    }
}
