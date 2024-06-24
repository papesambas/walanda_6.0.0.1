<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240624205923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1E671FFEE FOREIGN KEY (scolarite2_id) REFERENCES scolarites2 (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B15ECD988B FOREIGN KEY (scolarite3_id) REFERENCES scolarites3 (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B16D13ADFD FOREIGN KEY (redoublement1_id) REFERENCES redoublements1 (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B17FA60213 FOREIGN KEY (redoublement2_id) REFERENCES redoublements2 (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1C71A6576 FOREIGN KEY (redoublement3_id) REFERENCES redoublements3 (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1727ACA70 FOREIGN KEY (parent_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1F40B33B5 FOREIGN KEY (frais_scolarite_id) REFERENCES frais_scolarites (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE enseignements ADD CONSTRAINT FK_89D79280FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissements (id)');
        $this->addSql('ALTER TABLE enseignements ADD CONSTRAINT FK_89D79280B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE enseignements ADD CONSTRAINT FK_89D79280896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE etablissements ADD CONSTRAINT FK_29F65EB1B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE etablissements ADD CONSTRAINT FK_29F65EB1896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE frais_scolaires ADD CONSTRAINT FK_45A17205B318673 FOREIGN KEY (echeance_id) REFERENCES echeances (id)');
        $this->addSql('ALTER TABLE frais_scolaires ADD CONSTRAINT FK_45A1720C8B377BF FOREIGN KEY (frais_type_id) REFERENCES frais_type (id)');
        $this->addSql('ALTER TABLE frais_scolaires ADD CONSTRAINT FK_45A1720B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE frais_scolaires ADD CONSTRAINT FK_45A1720896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE frais_scolaires_frais_scolarites ADD CONSTRAINT FK_DDB628D3D031BFA8 FOREIGN KEY (frais_scolaires_id) REFERENCES frais_scolaires (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE frais_scolaires_frais_scolarites ADD CONSTRAINT FK_DDB628D35C8EF115 FOREIGN KEY (frais_scolarites_id) REFERENCES frais_scolarites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE frais_scolaires_annee_scolaires ADD CONSTRAINT FK_37275413D031BFA8 FOREIGN KEY (frais_scolaires_id) REFERENCES frais_scolaires (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE frais_scolaires_annee_scolaires ADD CONSTRAINT FK_37275413E639FDE4 FOREIGN KEY (annee_scolaires_id) REFERENCES annee_scolaires (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE frais_scolarites ADD CONSTRAINT FK_B130BF49E639FDE4 FOREIGN KEY (annee_scolaires_id) REFERENCES annee_scolaires (id)');
        $this->addSql('ALTER TABLE frais_scolarites ADD CONSTRAINT FK_B130BF49C8B377BF FOREIGN KEY (frais_type_id) REFERENCES frais_type (id)');
        $this->addSql('ALTER TABLE frais_scolarites ADD CONSTRAINT FK_B130BF49B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE frais_scolarites ADD CONSTRAINT FK_B130BF49896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE frais_type ADD CONSTRAINT FK_7926F141F6203804 FOREIGN KEY (statut_id) REFERENCES statuts (id)');
        $this->addSql('ALTER TABLE frais_type ADD CONSTRAINT FK_7926F141B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE frais_type ADD CONSTRAINT FK_7926F141B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE frais_type ADD CONSTRAINT FK_7926F141896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE lieu_naissances ADD CONSTRAINT FK_49F8927F131A4F72 FOREIGN KEY (commune_id) REFERENCES communes (id)');
        $this->addSql('ALTER TABLE lieu_naissances ADD CONSTRAINT FK_49F8927FB03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE lieu_naissances ADD CONSTRAINT FK_49F8927F896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408AC8121CE9 FOREIGN KEY (nom_id) REFERENCES noms (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408A58819F9E FOREIGN KEY (prenom_id) REFERENCES prenoms (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408AFDEF8996 FOREIGN KEY (profession_id) REFERENCES professions (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408A9420D165 FOREIGN KEY (telephone1_id) REFERENCES telephones (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408A86957E8B FOREIGN KEY (telephone2_id) REFERENCES telephones (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408AB03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408A896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE niveaux ADD CONSTRAINT FK_56F771A05EC1162 FOREIGN KEY (cycle_id) REFERENCES cycles (id)');
        $this->addSql('ALTER TABLE niveaux ADD CONSTRAINT FK_56F771A0B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE niveaux ADD CONSTRAINT FK_56F771A0896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE noms ADD CONSTRAINT FK_A069E65DB03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE noms ADD CONSTRAINT FK_A069E65D896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE parents ADD CONSTRAINT FK_FD501D6A3FD73900 FOREIGN KEY (pere_id) REFERENCES peres (id)');
        $this->addSql('ALTER TABLE parents ADD CONSTRAINT FK_FD501D6A39DEC40E FOREIGN KEY (mere_id) REFERENCES meres (id)');
        $this->addSql('ALTER TABLE parents ADD CONSTRAINT FK_FD501D6AB03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE parents ADD CONSTRAINT FK_FD501D6A896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B9C8121CE9 FOREIGN KEY (nom_id) REFERENCES noms (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B958819F9E FOREIGN KEY (prenom_id) REFERENCES prenoms (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B9FDEF8996 FOREIGN KEY (profession_id) REFERENCES professions (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B99420D165 FOREIGN KEY (telephone1_id) REFERENCES telephones (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B986957E8B FOREIGN KEY (telephone2_id) REFERENCES telephones (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B9B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B9896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE prenoms ADD CONSTRAINT FK_E71162E3B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE prenoms ADD CONSTRAINT FK_E71162E3896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE professions ADD CONSTRAINT FK_2FDA85FAB03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE professions ADD CONSTRAINT FK_2FDA85FA896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE redoublements1 ADD CONSTRAINT FK_2554EDA9B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE redoublements1 ADD CONSTRAINT FK_2554EDA9F4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE redoublements1 ADD CONSTRAINT FK_2554EDA9E671FFEE FOREIGN KEY (scolarite2_id) REFERENCES scolarites2 (id)');
        $this->addSql('ALTER TABLE redoublements1 ADD CONSTRAINT FK_2554EDA95ECD988B FOREIGN KEY (scolarite3_id) REFERENCES scolarites3 (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC13B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC136D13ADFD FOREIGN KEY (redoublement1_id) REFERENCES redoublements1 (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC13F4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC13E671FFEE FOREIGN KEY (scolarite2_id) REFERENCES scolarites2 (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC135ECD988B FOREIGN KEY (scolarite3_id) REFERENCES scolarites3 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C85B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C857FA60213 FOREIGN KEY (redoublement2_id) REFERENCES redoublements2 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C85F4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C85E671FFEE FOREIGN KEY (scolarite2_id) REFERENCES scolarites2 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C855ECD988B FOREIGN KEY (scolarite3_id) REFERENCES scolarites3 (id)');
        $this->addSql('ALTER TABLE regions ADD CONSTRAINT FK_A26779F3B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE regions ADD CONSTRAINT FK_A26779F3896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE santes ADD CONSTRAINT FK_C1A17FE9A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleves (id)');
        $this->addSql('ALTER TABLE santes ADD CONSTRAINT FK_C1A17FE9B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE santes ADD CONSTRAINT FK_C1A17FE9896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE scolarites1 ADD CONSTRAINT FK_328D2B44B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE scolarites2 ADD CONSTRAINT FK_AB847AFEF4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE scolarites2 ADD CONSTRAINT FK_AB847AFEB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE scolarites3 ADD CONSTRAINT FK_DC834A68B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE statuts ADD CONSTRAINT FK_403505E6B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE statuts ADD CONSTRAINT FK_403505E6B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE statuts ADD CONSTRAINT FK_403505E6896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE telephones ADD CONSTRAINT FK_6FCD09FB03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE telephones ADD CONSTRAINT FK_6FCD09F896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD adresse VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9C8121CE9 FOREIGN KEY (nom_id) REFERENCES noms (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E958819F9E FOREIGN KEY (prenom_id) REFERENCES prenoms (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1E671FFEE');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B15ECD988B');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B16D13ADFD');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B17FA60213');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1C71A6576');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1727ACA70');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1A76ED395');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1F40B33B5');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1B03A8386');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1896DBBDE');
        $this->addSql('ALTER TABLE enseignements DROP FOREIGN KEY FK_89D79280FF631228');
        $this->addSql('ALTER TABLE enseignements DROP FOREIGN KEY FK_89D79280B03A8386');
        $this->addSql('ALTER TABLE enseignements DROP FOREIGN KEY FK_89D79280896DBBDE');
        $this->addSql('ALTER TABLE etablissements DROP FOREIGN KEY FK_29F65EB1B03A8386');
        $this->addSql('ALTER TABLE etablissements DROP FOREIGN KEY FK_29F65EB1896DBBDE');
        $this->addSql('ALTER TABLE frais_scolaires DROP FOREIGN KEY FK_45A17205B318673');
        $this->addSql('ALTER TABLE frais_scolaires DROP FOREIGN KEY FK_45A1720C8B377BF');
        $this->addSql('ALTER TABLE frais_scolaires DROP FOREIGN KEY FK_45A1720B03A8386');
        $this->addSql('ALTER TABLE frais_scolaires DROP FOREIGN KEY FK_45A1720896DBBDE');
        $this->addSql('ALTER TABLE frais_scolaires_annee_scolaires DROP FOREIGN KEY FK_37275413D031BFA8');
        $this->addSql('ALTER TABLE frais_scolaires_annee_scolaires DROP FOREIGN KEY FK_37275413E639FDE4');
        $this->addSql('ALTER TABLE frais_scolaires_frais_scolarites DROP FOREIGN KEY FK_DDB628D3D031BFA8');
        $this->addSql('ALTER TABLE frais_scolaires_frais_scolarites DROP FOREIGN KEY FK_DDB628D35C8EF115');
        $this->addSql('ALTER TABLE frais_scolarites DROP FOREIGN KEY FK_B130BF49E639FDE4');
        $this->addSql('ALTER TABLE frais_scolarites DROP FOREIGN KEY FK_B130BF49C8B377BF');
        $this->addSql('ALTER TABLE frais_scolarites DROP FOREIGN KEY FK_B130BF49B03A8386');
        $this->addSql('ALTER TABLE frais_scolarites DROP FOREIGN KEY FK_B130BF49896DBBDE');
        $this->addSql('ALTER TABLE frais_type DROP FOREIGN KEY FK_7926F141F6203804');
        $this->addSql('ALTER TABLE frais_type DROP FOREIGN KEY FK_7926F141B3E9C81');
        $this->addSql('ALTER TABLE frais_type DROP FOREIGN KEY FK_7926F141B03A8386');
        $this->addSql('ALTER TABLE frais_type DROP FOREIGN KEY FK_7926F141896DBBDE');
        $this->addSql('ALTER TABLE lieu_naissances DROP FOREIGN KEY FK_49F8927F131A4F72');
        $this->addSql('ALTER TABLE lieu_naissances DROP FOREIGN KEY FK_49F8927FB03A8386');
        $this->addSql('ALTER TABLE lieu_naissances DROP FOREIGN KEY FK_49F8927F896DBBDE');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408AC8121CE9');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408A58819F9E');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408AFDEF8996');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408A9420D165');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408A86957E8B');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408AB03A8386');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408A896DBBDE');
        $this->addSql('ALTER TABLE niveaux DROP FOREIGN KEY FK_56F771A05EC1162');
        $this->addSql('ALTER TABLE niveaux DROP FOREIGN KEY FK_56F771A0B03A8386');
        $this->addSql('ALTER TABLE niveaux DROP FOREIGN KEY FK_56F771A0896DBBDE');
        $this->addSql('ALTER TABLE noms DROP FOREIGN KEY FK_A069E65DB03A8386');
        $this->addSql('ALTER TABLE noms DROP FOREIGN KEY FK_A069E65D896DBBDE');
        $this->addSql('ALTER TABLE parents DROP FOREIGN KEY FK_FD501D6A3FD73900');
        $this->addSql('ALTER TABLE parents DROP FOREIGN KEY FK_FD501D6A39DEC40E');
        $this->addSql('ALTER TABLE parents DROP FOREIGN KEY FK_FD501D6AB03A8386');
        $this->addSql('ALTER TABLE parents DROP FOREIGN KEY FK_FD501D6A896DBBDE');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B9C8121CE9');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B958819F9E');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B9FDEF8996');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B99420D165');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B986957E8B');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B9B03A8386');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B9896DBBDE');
        $this->addSql('ALTER TABLE prenoms DROP FOREIGN KEY FK_E71162E3B03A8386');
        $this->addSql('ALTER TABLE prenoms DROP FOREIGN KEY FK_E71162E3896DBBDE');
        $this->addSql('ALTER TABLE professions DROP FOREIGN KEY FK_2FDA85FAB03A8386');
        $this->addSql('ALTER TABLE professions DROP FOREIGN KEY FK_2FDA85FA896DBBDE');
        $this->addSql('ALTER TABLE redoublements1 DROP FOREIGN KEY FK_2554EDA9B3E9C81');
        $this->addSql('ALTER TABLE redoublements1 DROP FOREIGN KEY FK_2554EDA9F4C45000');
        $this->addSql('ALTER TABLE redoublements1 DROP FOREIGN KEY FK_2554EDA9E671FFEE');
        $this->addSql('ALTER TABLE redoublements1 DROP FOREIGN KEY FK_2554EDA95ECD988B');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC13B3E9C81');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC136D13ADFD');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC13F4C45000');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC13E671FFEE');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC135ECD988B');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C85B3E9C81');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C857FA60213');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C85F4C45000');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C85E671FFEE');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C855ECD988B');
        $this->addSql('ALTER TABLE regions DROP FOREIGN KEY FK_A26779F3B03A8386');
        $this->addSql('ALTER TABLE regions DROP FOREIGN KEY FK_A26779F3896DBBDE');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE santes DROP FOREIGN KEY FK_C1A17FE9A6CC7B2');
        $this->addSql('ALTER TABLE santes DROP FOREIGN KEY FK_C1A17FE9B03A8386');
        $this->addSql('ALTER TABLE santes DROP FOREIGN KEY FK_C1A17FE9896DBBDE');
        $this->addSql('ALTER TABLE scolarites1 DROP FOREIGN KEY FK_328D2B44B3E9C81');
        $this->addSql('ALTER TABLE scolarites2 DROP FOREIGN KEY FK_AB847AFEF4C45000');
        $this->addSql('ALTER TABLE scolarites2 DROP FOREIGN KEY FK_AB847AFEB3E9C81');
        $this->addSql('ALTER TABLE scolarites3 DROP FOREIGN KEY FK_DC834A68B3E9C81');
        $this->addSql('ALTER TABLE statuts DROP FOREIGN KEY FK_403505E6B3E9C81');
        $this->addSql('ALTER TABLE statuts DROP FOREIGN KEY FK_403505E6B03A8386');
        $this->addSql('ALTER TABLE statuts DROP FOREIGN KEY FK_403505E6896DBBDE');
        $this->addSql('ALTER TABLE telephones DROP FOREIGN KEY FK_6FCD09FB03A8386');
        $this->addSql('ALTER TABLE telephones DROP FOREIGN KEY FK_6FCD09F896DBBDE');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9C8121CE9');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E958819F9E');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9B03A8386');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9896DBBDE');
        $this->addSql('ALTER TABLE users DROP adresse');
    }
}
