CREATE TABLE [dbo].[IVR-BAR] (
    [ID]                      BIGINT IDENTITY(1,1) PRIMARY KEY,
    [ScenarioId]              CHAR (100) NULL,
    [CallerNumber]            CHAR (100) NULL,
    [CallerName]              CHAR (100) NULL,
    [StudentID]               CHAR (100) NULL,
    [ContactID]               CHAR (100) NULL,
    [ContactName]             CHAR (100) NULL,
    [EventName]               CHAR (100) NULL,
    [CallStartDateTime]       CHAR (100) NULL,
    [CallEndDateTime]         CHAR (100) NULL,
    [CallLength]              CHAR (100) NULL,
    [RemotePartyName]         CHAR (100) NULL,
    [RemotePartyUri]          CHAR (100) NULL,
    [RemotePartyNumber]       CHAR (100) NULL,
    [RemotePartyId]           CHAR (100) NULL,
    [QueueDisplayName]        CHAR (100) NULL,
    [CallsInQueue]            CHAR (100) NULL,
    [NumberOfAvailableAgents] CHAR (100) NULL,
    [AgentUPN]                CHAR (100) NULL,
    [TalkTime]                CHAR (100) NULL,
    [WaitTime]                CHAR (100) NULL,
    [TimedOut]                CHAR (100) NULL,
    [Abandoned]               CHAR (100) NULL,
    [ServiceLevelAchieved]    CHAR (100) NULL,
    [CallbackRequested]       CHAR (100) NULL,
    [VoicemailRequested]      CHAR (100) NULL
);
