<?php

class jsonldTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        /**  given I have a working live database connection
         *  I want to generate:
         *     a jsonld context for a vocabulary
         *     a jsonld context for a concept
         *     a jsonld description of the vocabulary
         *     a jsonld description of each concept
         *
         * The jsonld contexts are generated from a profile
         * The vocabulary description is generated from a vocabulary record
         * The concept description is generated from a concept record
         *
         * The concrete objects are instances of:
         * Vocabulary
         * Concept
         * Profiles
         *  Vocabulary Profile (attribute of the agent/project -- does not exist)
         *  Concept Profile (attribute of the vocabulary)
         *
         * The jsonld for a vocabulary is generated by
         * 1. Get the vocabulary
         * 2. Get the Profile for the Vocabulary->Agent->VocabularyProfile or the Vocabulary->Project->VocabularyProfile
         * 3. Build the Vocabulary description from the ProfileProperties and the Vocabulary data
         * 4. Get the Profile for the Vocabulary->ConceptProfile
         * 5. For each Concept build the Concept description from the profileProperties and the Concept data
         * 6. Build the Vocabulary Context from the Profile and update the existing context if it's different
         * 7. Build the Concept Context from the Profile and update the existing context if it's different
         *
         */
    }

    protected function tearDown()
    {
    }

    // tests
    public function testCreateVocabularyContextFromProfile()
    {

    }
}
