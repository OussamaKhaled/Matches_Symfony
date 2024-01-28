<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230520135344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matche ADD stade_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matche ADD CONSTRAINT FK_9FCAD5106538AB43 FOREIGN KEY (stade_id) REFERENCES stade (id)');
        $this->addSql('CREATE INDEX IDX_9FCAD5106538AB43 ON matche (stade_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matche DROP FOREIGN KEY FK_9FCAD5106538AB43');
        $this->addSql('DROP INDEX IDX_9FCAD5106538AB43 ON matche');
        $this->addSql('ALTER TABLE matche DROP stade_id');
    }
}
