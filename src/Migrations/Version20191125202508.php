<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191125202508 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE hub (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE account (id CHAR(36) NOT NULL --(DC2Type:guid)
        , name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , discr VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7D3656A4E7927C74 ON account (email)');
        $this->addSql('CREATE TABLE admin_account (id CHAR(36) NOT NULL --(DC2Type:guid)
        , default_hub_id INTEGER DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE vmm_account_hubs (account_id CHAR(36) NOT NULL --(DC2Type:guid)
        , hub_id INTEGER NOT NULL, PRIMARY KEY(account_id, hub_id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE hub');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE admin_account');
        $this->addSql('DROP TABLE vmm_account_hubs');
    }
}
