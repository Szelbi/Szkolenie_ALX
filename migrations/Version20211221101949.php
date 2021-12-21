<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211221101949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post ADD usr_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DC69D3FB FOREIGN KEY (usr_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DC69D3FB ON post (usr_id)');
    }

    public function down(Schema $schema): void
    {

        $this->addSql('ALTER TABLE post DROP CONSTRAINT FK_5A8A6C8DC69D3FB');
        $this->addSql('DROP INDEX IDX_5A8A6C8DC69D3FB');
        $this->addSql('ALTER TABLE post DROP usr_id');
    }
}
