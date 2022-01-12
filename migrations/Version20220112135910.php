<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220112135910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93698E55E70A');
        $this->addSql('DROP INDEX IDX_C27C93698E55E70A ON stage');
        $this->addSql('ALTER TABLE stage CHANGE stages_id entreprises_stages_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369E0D8C0EC FOREIGN KEY (entreprises_stages_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369E0D8C0EC ON stage (entreprises_stages_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369E0D8C0EC');
        $this->addSql('DROP INDEX IDX_C27C9369E0D8C0EC ON stage');
        $this->addSql('ALTER TABLE stage CHANGE entreprises_stages_id stages_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93698E55E70A FOREIGN KEY (stages_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_C27C93698E55E70A ON stage (stages_id)');
    }
}
